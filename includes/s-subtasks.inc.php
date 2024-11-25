<?php

if (isset($_POST['Add-Subtask']))
{
    
    require 'dbh.inc.php';
    
    
    $action = $_POST['action'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projid = $_POST['projid'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $projname = $_POST['projname'];
    $createdby = $_POST['createdby'];
    $taskname = $_POST['task'];
    $subtask = $_POST['subtask'];
    $taskdesc = $_POST['taskdesc'];
    $taskmember = $_POST['taskmember'];
    $tduration = $_POST['tduration'];
    $tend = $_POST['tend'];
    $taskstat = 'On-Going';
    $userName = $_POST['uid'];
    $taskid = $_POST['taskid'];
    $leader = $_POST['leader'];
    $status = 'On-Going';
    
    if (empty($subtask) || empty($taskdesc) || empty($taskmember) || empty($tduration) || empty($tend))
    {
        header("Location: ../Professors/project-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
    
        $query = "UPDATE `tasks` SET `taskstat`='".$taskstat."' WHERE `id` = $taskid";
        $result = mysqli_query($conn, $query);
        $sql = "insert into subtasks(course, section, subj_name, projid, grpid, grpno, taskid, taskname, subtaskname, taskdesc, taskmember,  tduration, tend,"
                . "leader, createdby, status)" 
                . "values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Students/collaboration-board.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $course, $section, $subject, $projid, $grpid, $grpno, $taskid, $taskname, $subtask, $taskdesc, $taskmember, $tduration, $tend, $leader, $createdby, $status);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $sql = "insert into activity_log(uidUsers, action)"
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
            header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&add_subtask=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$createdby");
    exit();
}