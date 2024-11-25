<?php

if (isset($_POST['Add-Grade']))
{

    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $action = "Uploaded Grade"; 
    $projid = $_POST['id'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $projsubid = $_POST['projsubid'];
    $grade = $_POST['grade'];
    $gradetype = $_POST['gradetype'];
    $uploadedby = $_POST['uploadedby'];
    $projstat = 'Done';
    $grpname = 'Group';


    $sql = "INSERT INTO gradedproject(projid, grpid, grpno, projsubid, member, grade, gradetype, uploadedby) VALUES ('$projid','$grpid','$grpno','$projsubid','$grpname','$grade','$gradetype','$uploadedby')";
    if(mysqli_query($conn,$sql))
    {
        $query = "UPDATE `groups` SET `projstat`='".$projstat."' WHERE `idGroups` = $grpid";
                
        $result = mysqli_query($conn, $query);
        
        if(!$result)
        {
            header("Location: ../Professors/grade-book.php?error=sqlerror");
            exit();
        }
        else
        {
            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/404.html&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Professors/grade-book.php?add_grade=success");
            exit();
            }
        }
    }
    else
    {
        header("Location: ../Professors/grade-book.php?");
        exit();
    }
   
}
