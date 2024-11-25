<?php

if (isset($_POST['Edit-Grp']))
{
    
    require 'dbh.inc.php';

    $id = $_POST['task'];
    $action = $_POST['action'];
    $actions = $_POST['actions'];
    $leader = $_POST['leader'];
    $members = $_POST['members'];
    $user = $_POST['user'];

    
    if (empty($leader) || empty($members))
    {
        header("Location: ../Professors/404.html?");
        exit();
    }
    
    else
    {   
        $values  = implode(",", $members);
        $query = "UPDATE `groups` SET `leader`='".$leader."', `members`='".$values."' WHERE `idGroups` = $id ";
        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            header("Location: ../Admin/groups.php?error=sqlerror");
            exit();
        }
        else
        {
                
            $sql = "insert into activity_log(uidUsers, action) "
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Admin/groups.php?error=sqlerror");
                exit();
            }

            else
            {
            
                mysqli_stmt_bind_param($que, "ss", $user, $actions);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);


                header("Location: ../Admin/groups.php?edit_audit=success");
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