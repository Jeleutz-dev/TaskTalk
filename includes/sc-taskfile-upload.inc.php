<?php

if (isset($_POST['Upload-File']))
{

    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $action = "Upload File";
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projname = $_POST['projname'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $leader = $_POST['leader'];
    $projid = $_POST['projid'];
    $taskid = $_POST['tkid'];
    $uploadedby = $_POST['uploadedby'];
    $fileName = basename($_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $one_mb = 0.001;
    $fileSize = $_FILES['file']['size'];
    $fileSize_mb = $fileSize*$one_mb;
    $fileType = $_FILES['file']['type']; 
    $file_store = '../uploads/File Uploads/'.$fileName;

    move_uploaded_file($fileTmpName, $file_store);

    $sql = "INSERT INTO fileupload(course,section,subject,projid,grpno,grpid,taskid,leader,uploadedby,filename,filesize) VALUES ('$course','$section','$subject','$projid','$grpno','$grpid','$taskid','$leader','$uploadedby','$fileName','$fileSize_mb')";

    if(mysqli_query($conn,$sql))
    {
        $sql = "insert into activity_log(uidUsers, action)"
        . "values (?,?)";
        $que = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($que, $sql))
        {
            header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=filenotuploaded");
            exit();
        }
        else
        {
        
        mysqli_stmt_bind_param($que, "ss", $userName, $action);
        mysqli_stmt_execute($que);
        mysqli_stmt_store_result($que);
        header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&task_file_upload=success");
        exit();
        }
    }
    else
    {
        header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader");
        exit();
    }
   
}
