<?php

if (isset($_POST['Save-Status']))
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
    $status = $_POST['status'];
    $userName = $_POST['uid'];
    $taskid = $_POST['idtask'];
    $subtaskid = $_POST['subtaskid'];
    $leader = $_POST['leader'];
    $taskstat = 'On-Going';
    
    if (empty($status))
    {
        header("Location: ../Students/collaboration-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {

        $query = "UPDATE `subtasks` SET `status`='".$status."' WHERE `id` = $subtaskid";
        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            header("Location: ../Students/collaboration-board.php?error=sqlerror");
            exit();
        }
        else
        {
            $query1 = "UPDATE `tasks` SET `taskstat`='".$taskstat."' WHERE `id` = $taskid";
            $result1 = mysqli_query($conn, $query1);
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
            header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&change_status=success");
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