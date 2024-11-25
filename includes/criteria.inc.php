<?php

if (isset($_POST['Add-Criteria']))
{

    require 'dbh.inc.php';

    $userName = $_SESSION['userUid'];
    $action = "Upload File";
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projname = $_POST['projname'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $leader = $_POST['leader'];
    $projid = $_POST['cri'];
    $uploadedby = $_POST['uploadedby'];
    $fileName = basename($_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $one_mb = 0.001;
    $fileSize = $_FILES['file']['size'];
    $fileSize_mb = $fileSize*$one_mb;
    $fileType = $_FILES['file']['type']; 
    $file_store = '../uploads/Criteria/'.$fileName;

    move_uploaded_file($fileTmpName, $file_store);

    $sql = "INSERT INTO criteria(projid,uploadedby,filename,filesize) VALUES ('$projid','$uploadedby','$fileName','$fileSize_mb')";
    if(mysqli_query($conn,$sql))
    {
        $sql = "insert into activity_log(uidUsers, action)"
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Professors/dashboard.php?error=filenotuploaded");
                        exit();
                    }
                    else
                    {
                    
                    mysqli_stmt_bind_param($que, "ss", $userName, $action);
                    mysqli_stmt_execute($que);
                    mysqli_stmt_store_result($que);
                    header("Location: ../Professors/dashboard.php?file_upload=success");
                    exit();
                    }
    }
    else
    {
        header("Location: ../Professors/dashboard.php");
        exit();
    }
   
}
