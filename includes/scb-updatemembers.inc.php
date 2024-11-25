<?php

if (isset($_POST['Update-Member']))
{
    
    require 'dbh.inc.php';
    
    $action = 'Add Group Members';
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $grpid = $_POST['idgrp'];
    $projname = $_POST['projname'];
    $leader = $_POST['leader'];
    $projid = $_POST['upid'];
    $grpno = $_POST['idlead'];
    $members = $_POST['members'];
    $createdby = $_POST['createdby'];
    $userName = $_POST['uid'];
    $status = 'unread';
    
    if (empty($members))
    {
        header("Location: ../Students/404.html");
        exit();
    }
    
    else
    {
        $squery = mysqli_query($conn,"SELECT * FROM groups where idGroups ='$grpid' AND projid='$projid' AND groupno='".$grpno."' ");
        $que1 = mysqli_fetch_assoc($squery);
        $lead = explode(',',$que1['members']);
    
        $arrayi = implode(",",$members);
    
        array_push($lead, $arrayi);
        $values  = implode(",", $lead);
        print_r($values) ;

        $query = "UPDATE `groups` SET `members`='".$values."' WHERE `projid` = $projid AND `idGroups` = $grpid AND `groupno` = $grpno ";
        $result = mysqli_query($conn, $query);
        
        if(!$result)
        {
            header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&error=sqlerror");
                exit();
        }
        
        else
        {

            $sql = "insert into notifications(uidUsers, course, section, subject, projid, grpid, grpno, leader, members, action, status)" . "values (?,?,?,?,?,?,?,?,?,?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&error=sqlerror");
                exit();
            }
            else
            {
                for($x=0; $x<count($members); $x++){
                    $grp_no = $x+1;


            mysqli_stmt_bind_param($que, "sssssssssss", $userName, $course, $section, $subject, $projid, $grpid, $grpno, $leader, $members[$x], $action, $status);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            } 
            }

            $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }

            else
            {
                    
                mysqli_stmt_bind_param($que, "ss", $userName, $action);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);

                $sql_que = mysqli_query($conn, "SELECT * FROM section where idSection='".($section). "'");
                $qu = mysqli_fetch_assoc($sql_que);
                $sec = $qu['section'];

                $result = mysqli_query($conn, "SELECT * FROM course where idCourse='".($course). "'");
                $res = mysqli_fetch_assoc($result);
                $qrr = $res['depart_name'];

                // http://localhost/TaskTalk/Professors/collaboration-board.php?course=4&section=23&subject=Reading%20Visual%20Arts&id=107&projname=Project%205&grpno=1&grpid=97&leader=jeffyuy
                header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&add_members=success");
                exit();
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname");
    exit();
}