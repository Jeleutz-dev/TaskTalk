<?php

if (isset($_POST['Edit-Audit']))
{
    
    require 'dbh.inc.php';

    $id = $_POST['task'];
    $action = $_POST['action'];
    $actions = $_POST['actions'];
    $userName = $_POST['uid'];
    $user = $_POST['user'];

    
    if (empty($userName) || empty($action))
    {
        header("Location: ../Professors/project-board.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $query = "UPDATE `activity_log` SET `uidUsers`='".$userName."', `action`='".$action."' WHERE `activity_log_id` = $id ";
        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            header("Location: ../Admin/audit-trail.php?error=sqlerror");
            exit();
        }
        else
        {
                
            $sql = "insert into activity_log(uidUsers, action) "
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Admin/audit-trail.php?error=sqlerror");
                exit();
            }

            else
            {
            
                mysqli_stmt_bind_param($que, "ss", $user, $actions);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);


                header("Location: ../Admin/audit-trail.php?edit_audit=success");
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