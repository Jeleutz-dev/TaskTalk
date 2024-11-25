<?php

if (isset($_POST['Add-Task']))
{
    
    require 'dbh.inc.php';
    
    
    $action = $_POST['action'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projid = $_POST['projid'];
    $projname = $_POST['projname'];
    $createdby = $_POST['createdby'];
    $taskname = $_POST['taskname'];
    $taskdesc = $_POST['taskdesc'];
    $taskmember = $_POST['taskmember'];
    $tduration = $_POST['tduration'];
    $tend = $_POST['tend'];
    $taskstat = 'Pending';
    $userName = $_POST['uid'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $leader = $_POST['leader'];
    
    if (empty($taskname) || empty($taskdesc) || empty($taskmember) || empty($tduration) || empty($tend))
    {
        header("Location: ../Professors/collaboration-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $sql = "insert into tasks(course, section, subj_name, projid, grpid, grpno, createdby, leader, taskname, taskdesc, taskmember,  tduration, tend,"
                . "taskstat)" 
                . "values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Professors/collaboration-board.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "ssssssssssssss", $course, $section, $subject, $projid, $grpid, $grpno, $createdby, $leader, $taskname, $taskdesc, $taskmember, $tend,
                    $tduration,
                    $taskstat);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&add_task=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}