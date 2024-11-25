<?php

if (isset($_POST['Upload-File']))
{

    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $action = "Edit File";
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projname = $_POST['projname'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $leader = $_POST['leader'];
    $projid = $_POST['projid'];
    $staskid = $_POST['editf'];
    $uploadedby = $_POST['uploadedby'];
    $task = $_POST['task'];
    $subtask = $_POST['subtask'];
    $fileName = basename($_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $one_mb = 0.001;
    $fileSize = $_FILES['file']['size'];
    $fileSize_mb = $fileSize*$one_mb;
    $fileType = $_FILES['file']['type']; 
    $file_store = '../uploads/File Uploads/'.$fileName;

    move_uploaded_file($fileTmpName, $file_store);

    if(empty($filename)){
        $query = "UPDATE `fileupload` SET `taskid`='".$task."', `subtaskid`='".$subtask."', `updatedby`='".$uploadedby."', `filename`='".$fileName."', `filesize`='".$fileSize_mb."'  WHERE `id` = $staskid";

        $result = mysqli_query($conn, $query);
            
        if(!$result)
        {
            header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&error=sqlerror");
            exit();
        }
        else
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
    }
    
    else{
        $query = "UPDATE `fileupload` SET `taskid`='".$task."', `subtaskid`='".$subtask."', `updatedby`='".$uploadedby."', `filename`='".$fileName."', `filesize`='".$fileSize_mb."' WHERE `id` = $staskid";

        $result = mysqli_query($conn, $query);
            
        if(!$result)
        {
            header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&error=sqlerror");
            exit();
        }
        else
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
    }

    
}
else
{
    header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}
   

