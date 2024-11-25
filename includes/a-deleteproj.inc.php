<?php

if (isset($_POST['Delete-Proj']))
{
    
    require 'dbh.inc.php';
    
    
    $id = $_POST['del'];
    $action = $_POST['action'];
    $actions = $_POST['actions'];
    $userName = $_POST['uid'];
    $user = $_POST['user'];
    
    if (empty($id))
    {
        header("Location: ../Students/404.html");
        exit();
    }
    
    else
    {
        // sql to delete a record
        $sql = "DELETE projects, criteria, groups, tasks , subtasks, announcements, comments, peer_grading, projsubmit, gradedproject, fileupload
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
        WHERE
            projects.id = '".$id."'";

        if (!mysqli_query($conn, $sql)) {
            header("Location: ../Admin/audit-trail.php?error=sqlerror");
            exit();
        }
        else{
            $sql = "insert into activity_log(uidUsers, action)"
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
            header("Location: ../Admin/projects.php?&delete_audit=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($sql);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}