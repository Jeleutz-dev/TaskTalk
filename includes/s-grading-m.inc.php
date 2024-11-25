<?php

if (isset($_POST['Submit-Grading']))
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
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $userName = $_POST['uid'];
    $member = $_POST['member'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $q10 = $_POST['q10'];
    $total = ($q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10)/50 * 100;

    
    if (empty($q1) || empty($q2) || empty($q3) || empty($q4) || empty($q5) || empty($q6) || empty($q7) || empty($q8) || empty($q9) || empty($q10) )
    {
        header("Location: ../Students/participation-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $sql = "insert into peer_grading(course, section, subject, projid, grpid, grpno, createdby, leader, user, member, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, total)" 
                . "values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Students/participation-board.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssss", $course, $section, $subject, $projid, $grpid, $grpno, $createdby,
                    $leader, $userName, $member, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $total);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Students/participation-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Students/participation-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&add_grade=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/participation-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grrpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}