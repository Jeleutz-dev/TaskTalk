<?php

if (isset($_POST['Add-Member']))
{
    
    require 'dbh.inc.php';
    
    $action = $_POST['action'];
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $groupno = $_POST['id'];
    $groupid = $_POST['grp'];
    $projname = $_POST['projname'];
    $projId = $_POST['projId'];
    $leader = $_POST['lead'];
    $members = $_POST['members'];
    $createdby = $_POST['createdby'];
    $userName = $_POST['uid'];
    $status = 'unread';
    
    if (empty($members))
    {
        header("Location: ../Professors/404.html");
        exit();
    }
    
    else
    {

        $values  = implode(",", $members);
        $query = "UPDATE `groups` SET `members`='".$values."' WHERE `idGroups` = $groupid";
        
        $result = mysqli_query($conn, $query);
        
        if(!$result)
        {
            header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&error=sqlerror");
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


            mysqli_stmt_bind_param($que, "sssssssssss", $userName, $course, $section, $subject, $projId, $groupid, $groupno, $leader,  $members[$x], $action, $status);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            } 
        }

            $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&error=sqlerror");
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

                header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&grpno=$groupno&grpid=$groupid&leader=$leader&add_members=success");
                exit();
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname");
    exit();
}