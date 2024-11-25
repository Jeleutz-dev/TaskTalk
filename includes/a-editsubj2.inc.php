<?php

if (isset($_POST['Edit-Subj2']))
{
    
    require 'dbh.inc.php';

    $id = $_POST['log'];
    $subject_title = $_POST['action'];
    $actions = $_POST['actions'];
    $subject_code = $_POST['uid'];
    $user = $_POST['user'];

    
    if (empty($subject_code) || empty($subject_title))
    {
        header("Location: ../Professors/project-board.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $query = "UPDATE `subject` SET `subject_code`='".$subject_code."', `subject_title`='".$subject_title."' WHERE `subject_id` = $id ";
        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            header("Location: ../Admin/subjects.php?error=sqlerror");
            exit();
        }
        else
        {
                
            $sql = "insert into activity_log(uidUsers, action) "
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Admin/subjects.php?error=sqlerror");
                exit();
            }

            else
            {
            
                mysqli_stmt_bind_param($que, "ss", $user, $actions);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);


                header("Location: ../Admin/subjects.php?edit_subjects=success");
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