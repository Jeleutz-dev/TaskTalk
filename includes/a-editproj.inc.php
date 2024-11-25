<?php

if (isset($_POST['Edit-Proj']))
{
    
    require 'dbh.inc.php';

    $id = $_POST['task'];
    $user = $_POST['user'];
    $actions = $_POST['actions'];
    $projn = $_POST['projn'];
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $leader = $_POST['leader'];
    $projd = $_POST['projd'];
    $due = $_POST['due'];

    
    if (empty($projn) || empty($subject) || empty($course) || empty($section) || empty($leader) || empty($projd) || empty($due))  
    {
        header("Location: ../Professors/project-board.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $values  = implode(",", $leader);
        $query = "UPDATE `projects` SET `projname`='".$projn."', `subj_name`='".$subject."', `course`='".$course."', `section`='".$section."', `leader`='".$values."', `projdesc`='".$projd."', `duedate`='".$due."' WHERE `id` = $id ";
        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            header("Location: ../Admin/projects.php?error=sqlerror");
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


                header("Location: ../Admin/projects.php?edit_audit=success");
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