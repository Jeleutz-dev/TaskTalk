<?php

if (isset($_POST['Save-Grade']))
{

    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $action = "Uploaded Grade"; 
    $projid = $_POST['projid'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projsubid = $_POST['projsubid'];
    $projname = $_POST['projname'];
    $leader = $_POST['leader'];
    $grade = $_POST['grade'];
    $gradetype = $_POST['gradetype'];
    $uploadedby = $_POST['uploadedby'];
    $projstat = 'Done';
    $gradeid = $_POST['indiv'];
    $type ='Both';
    
    $query = "UPDATE `gradedproject` SET `grade`='".$grade."'  WHERE `id` = '".$gradeid."'";
                
    $result = mysqli_query($conn, $query);
    
    if(!$result)
    {
        header("Location: ../Professors/grade-summary.php?course=$course&section=$section&subject=$subject&id=$projid&grpno=$grpno&grpid=$grpid&projname=$projname&leader=$leader&type=$type&error=sqlerror1");
        exit();
    }
    else
    {
        $sql = "insert into activity_log(uidUsers, action)"
        . "values (?,?)";
        $que = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($que, $sql))
        {
            header("Location: ../Professors/404.html&error=sqlerror2");
            exit();
        }
        else
        {
        
        mysqli_stmt_bind_param($que, "ss", $userName, $action);
        mysqli_stmt_execute($que);
        mysqli_stmt_store_result($que);
        header("Location: ../Professors/grade-summary.php?course=$course&section=$section&subject=$subject&id=$projid&grpno=$grpno&grpid=$grpid&projname=$projname&leader=$leader&type=$type&add_grade=success");
        exit();
        }
        
    }
}
else
{
    header("Location: ../Professors/grade-summary.php?course=$course&section=$section&subject=$subject&id=$projid&grpno=$grpno&grpid=$grpid&projname=$projname&leader=$leader&type=$type");
    exit();
}
