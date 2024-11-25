<?php

if (isset($_POST['Edit-Sec2']))
{
    
    require 'dbh.inc.php';

    $id = $_POST['log'];
    $department = $_POST['action'];
    $actions = $_POST['actions'];
    $section = $_POST['uid'];
    $user = $_POST['user'];

    
    if (empty($section) || empty($department))
    {
        header("Location: ../Professors/project-board.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $query = "UPDATE `section` SET `section`='".$section."', `department`='".$department."' WHERE `idSection` = $id ";
        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            header("Location: ../Admin/sections.php?error=sqlerror");
            exit();
        }
        else
        {
                
            $sql = "insert into activity_log(uidUsers, action) "
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Admin/sections.php?error=sqlerror");
                exit();
            }

            else
            {
            
                mysqli_stmt_bind_param($que, "ss", $user, $actions);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);


                header("Location: ../Admin/sections.php?edit_audit=success");
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