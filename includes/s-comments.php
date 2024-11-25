<?php

if (isset($_POST['post-comments']))
{
    
    require 'dbh.inc.php';
    
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $action = 'Post Comment';
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projid = $_POST['projid'];
    $projname = $_POST['projname'];
    $createdby = $_POST['createdby'];
    $leader = $_POST['leader'];
    $datetime = $_POST['datetime'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $userName = $_POST['uid'];
    $postid = $_POST['postid'];
    $status = 'unread';
    
    if (empty($comment))
    {
        header("Location: ../Students/collaboration-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
                
        $sql = "insert into comments(course, section, subject, projid, grpid, grpno, createdby, leader, postid, comment, user)" 
                . "values (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Students/project-board.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "sssssssssss", $course, $section, $subject, $projid, $grpid, $grpno, $createdby,
                    $leader, $postid, $comment, $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $sql = "insert into notifications(uidUsers, course, section, subject, projid, grpid, grpno, leader, createdby, action, comment, status)" . "values (?,?,?,?,?,?,?,?,?,?,?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ssssssssssss", $userName, $course, $section, $subject, $projid, $grpid, $grpno, $leader, $createdby, $action, $comment, $status);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            }
            // ---------------------------------
            $sql = "insert into notifications(uidUsers, course, section, subject, projid, grpid, grpno, leader, members, createdby, action, comment, status)" . "values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "sssssssssssss", $userName, $course, $section, $subject, $projid, $grpid, $grpno, $leader, $userName, $createdby, $action, $comment, $status);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            }

            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&post=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grrpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}