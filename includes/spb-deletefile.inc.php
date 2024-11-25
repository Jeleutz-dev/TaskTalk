<?php

if (isset($_POST['Delete-Task']))
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
    $taskstat = 'On-Going';
    $userName = $_POST['uid'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $leader = $_POST['leader'];
    $taskid = $_POST['delfile'];
    
    if (empty($taskid))
    {
        header("Location: ../Students/404.html");
        exit();
    }
    
    else
    {
        // sql to delete a record
        $sql = "DELETE FROM fileupload where id = '".$taskid."'";

            if (mysqli_query($conn, $sql)) {
                    
                $sql = "insert into activity_log(uidUsers, action)"
                . "values (?,?)";
                $que = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($que, $sql))
                {
                    header("Location: ../Students/participation-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                    exit();
                }
                else
                {
                    
                    mysqli_stmt_bind_param($que, "ss", $userName, $action);
                    mysqli_stmt_execute($que);
                    mysqli_stmt_store_result($que);
                    header("Location: ../Students/participation-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&delete_task=success");
                    exit();
                    }

                }
            
        
    }

    mysqli_stmt_close($query);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Students/participation-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}