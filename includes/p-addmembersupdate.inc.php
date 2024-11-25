<?php

if (isset($_POST['Update-Member']))
{
    
    require 'dbh.inc.php';
    
    $action = $_POST['action'];
    $no = $_POST['no'];
    $sno = $_POST['sno'];
    $projname = $_POST['projname'];
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $leader = $_POST['idlead'];
    $createdby = $_POST['createdby'];
    $duedate = $_POST['due'];
    $projdesc = $_POST['projd'];
    $userName = $_POST['uid'];
    $grpid = $_POST['idgrp'];
    $grpno = $_POST['upid'];
    $projid = $_POST['projid'];
    $members = $_POST['members'];
    $status = 'unread';
    
    if (empty($members) || empty($grpid))
    {
        header("Location: ../Professors/project-board.php?error=emptyfields&uid=");
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

        if (!$result)
        {
            header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&error=sqlerror");
            exit();
        }
        else
        {

            $sql = "insert into notifications(uidUsers, course, section, subject, projid, grpid, grpno, leader, members, action, status)" . "values (?,?,?,?,?,?,?,?,?,?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&error=sqlerror");
                exit();
            }
            else
            {
                for($x=0; $x<count($members); $x++){
                    $grp_no = $x+1;


            mysqli_stmt_bind_param($que, "sssssssssss", $userName, $course, $section, $subject, $projid, $grpid, $grpno, $leader,  $members[$x], $action, $status);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            } 
        }
                
            $sql = "insert into activity_log(uidUsers, action) "
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&error=sqlerror");
                exit();
            }

            else
            {
            
                mysqli_stmt_bind_param($que, "ss", $userName, $action);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);


                header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&update_members=success");
                exit();
            }
                
            
        }
        // $stmt->close();
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
}


else
{
    header("Location: ../Professors/dashboard.php?");
    exit();
}