<?php

if (isset($_POST['file-submit']))
{

    require 'dbh.inc.php';

    $taskname = $_POST['taskname'];
    $subtaskname = $_POST['subtaskname'];
    $title = $_POST['title'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type']; 
    $file_store = '../uploads/File Uploads/'.$fileName;

    move_uploaded_file($fileTmpName, $file_store);

    $sql = "INSERT INTO fileupload(taskname,subtaskname,Title,name) VALUES ('$taskname','$subtaskname','$title','$fileName')";
    if(mysqli_query($conn,$sql))
    {
        header("Location: ../Students/project-taskboard.php?file=uploaded");
        exit();
    }
    else
    {
        header("Location: ../Students/project-taskboard.php?file=notuploaded");
        exit();
    }
   
}
