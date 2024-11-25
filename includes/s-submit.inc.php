<?php

if (isset($_POST['Submit-Project']))
{
    
    require 'dbh.inc.php';
    
    $action = $_POST['action'];
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
    $submitted_to = $_POST['submitted_to'];
    $members = $_POST['members'];
    $file = $_POST['file'];
    $projstat='Done';
    
    if (empty($submitted_to))
    {
        header("Location: ../Professors/collaboration-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $sql = "insert into projsubmit(course, section, subject, projid, grpid, grpno, submitted_to, leader, members, filename)" 
                . "values (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Students/collaboration-board.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "ssssssssss", $course, $section, $subject, $projid, $grpid, $grpno, $submitted_to,
                    $leader, $members, $file);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
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
            header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&submit_project=success");
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