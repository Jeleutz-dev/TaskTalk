<?php

if (isset($_POST['Add-Section']))
{
    
    require 'dbh.inc.php';
    
    
    $action = $_POST['action'];
    $course = $_POST['course1'];
    $section = $_POST['section1'];
    $subject= $_POST['sub'];
    $userName = $_POST['uid'];
    
    if (empty($subject))
    {
        header("Location: ../Professors/project-list.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        // checking if a user already exists with the given section
        $sql1 = "select section from section_add where section=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql1))
        {
            header("Location: ../project-list.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $section);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                header("Location: ../Professors/project-list.php?section_already_exists=".$section);
                exit();
            }
            else
            {
                // checking if a section already exists with the given section

                $sql = "insert into section_add(course, section, subject, uidUsers)"
                        . "values (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../Professors/project-list.php?error=sqlerror");
                    exit();
                }
                else
                {
                    
                    mysqli_stmt_bind_param($stmt, "ssss", $course, $section, $subject, $userName);
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