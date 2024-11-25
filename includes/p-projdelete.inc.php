<?php

if (isset($_POST['Delete-Proj']))
{
    
    require 'dbh.inc.php';
    
    
    $action = $_POST['action'];
    $subject = $_POST['subj'];
    $course = $_POST['co'];
    $section = $_POST['sect'];
    $projname = $_POST['projname'];
    $createdby = $_POST['createdby'];
    $projdesc = $_POST['projdesc'];
    $duedate = $_POST['duedate'];
    $taskstat = 'On-Going';
    $userName = $_POST['uid'];
    $leader = $_POST['leader'];
    $dprojid = $_POST['dproj'];
    
    if (empty($dprojid))
    {
        header("Location: ../Professors/404.html");
        exit();
    }
    
    else
    {
        // sql to delete a record
        $sql = "DELETE projects, criteria, groups, tasks , subtasks, announcements, comments, peer_grading, projsubmit, gradedproject, fileupload, subj_add, section_add, notifications
        FROM projects 
        LEFT join criteria on projects.id = criteria.projid 
        LEFT join groups on projects.id = groups.projid
        LEFT join tasks on projects.id = tasks.projid
        LEFT join subtasks on projects.id = subtasks.projid
        LEFT join announcements on projects.id = announcements.projid
        LEFT join comments on projects.id = comments.projid
        LEFT join peer_grading on projects.id = peer_grading.projid
        LEFT join projsubmit on projects.id = projsubmit.projid
        LEFT join gradedproject on projects.id = gradedproject.projid
        LEFT join fileupload on projects.id = fileupload.projid
        LEFT join subj_add on projects.id = subj_add.projid
        LEFT join section_add on projects.id = section_add.projid
        LEFT join notifications on projects.id = notifications.projid
        WHERE
            projects.id = '".$dprojid."'";

        if (!mysqli_query($conn, $sql)) {
            header("Location: ../Professors/404.html?error=sqlerror");
            exit();
        }
        else{
            
                
            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/dashboard.php?error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Professors/dashboard.php?delete_project=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($sql);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/dashboard.php?");
    exit();
}