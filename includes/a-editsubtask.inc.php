<?php

if (isset($_POST['Edit-Subtask']))
{
    
    require 'dbh.inc.php';

    $id = $_POST['subtask'];
    $action = $_POST['action'];
    $actions = $_POST['actions'];
    $leader = $_POST['leader'];
    $taskmember = $_POST['taskmember'];
    $taskname = $_POST['taskname'];
    $taskdesc = $_POST['taskdesc'];
    $tend = $_POST['tend'];
    $user = $_POST['user'];
    $tduration = $_POST['tduration'];

    
    if (empty($taskname) || empty($taskmember))
    {
        header("Location: ../Professors/404.html?");
        exit();
    }
    
    else
    {   
        
        $query = "UPDATE `subtasks` SET `subtaskname`='".$taskname."', `taskdesc`='".$taskdesc."', `leader`='".$leader."', `taskmember`='".$taskmember."', `tduration`='".$tduration."', `tend`='".$tend."'  WHERE `id` = $id";
        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            header("Location: ../Admin/tasks.php?error=sqlerror");
            exit();
        }
        else
        {
                
            $sql = "insert into activity_log(uidUsers, action) "
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Admin/tasks.php?error=sqlerror");
                exit();
            }

            else
            {
            
                mysqli_stmt_bind_param($que, "ss", $user, $actions);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);


                header("Location: ../Admin/tasks.php?edit_audit=success");
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