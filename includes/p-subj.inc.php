<?php

if (isset($_POST['Add-Subject']))
{
    
    require 'dbh.inc.php';
    
    
    $action = $_POST['action'];
    $subject= $_POST['subject'];
    $userName = $_POST['uid'];
    
    if (empty($subject))
    {
        header("Location: ../Professors/project-list.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        // checking if a user already exists with the given section
        $sql1 = "select subject from subj_add where subject=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql1))
        {
            header("Location: ../project-list.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $subject);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                header("Location: ../Professors/project-list.php?subject_already_exists=".$subject);
                exit();
            }
            else
            {
                // checking if a user already exists with the given username

                $sql = "insert into subj_add(subject, uidUsers)"
                        . "values (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../Professors/project-list.php?error=sqlerror");
                    exit();
                }
                else
                {
                    
                    mysqli_stmt_bind_param($stmt, "ss", $subject, $userName);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    
                    $sql = "insert into activity_log(uidUsers, action)"
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Professors/project-list.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                    
                    mysqli_stmt_bind_param($que, "ss", $userName, $action);
                    mysqli_stmt_execute($que);
                    mysqli_stmt_store_result($que);
                    header("Location: ../Professors/project-list.php?success");
                    exit();
                    }

                }
            }
        }
        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/project-list.php");
    exit();
}