<?php

if (isset($_POST['Edit-Project']))
{
    
    require 'dbh.inc.php';
    
    
    $action = $_POST['action'];
    $subject = $_POST['subj'];
    $course = $_POST['co'];
    $section = $_POST['sect'];
    $projname = $_POST['projname'];
    $createdby = $_POST['createdby'];
    $projdesc = $_POST['projdesc'];
    $duedate = $_POST['duedate'];
    $projstat = 'On-Going';
    $userName = $_POST['uid'];
    $leader = $_POST['leader'];
    $projid = $_POST['id'];
    $score = $_POST['score'];
    $fileName = basename($_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $one_mb = 0.001;
    $fileSize = $_FILES['file']['size'];
    $fileSize_mb = $fileSize*$one_mb;
    $fileType = $_FILES['file']['type']; 
    $file_store = '../uploads/Criteria/'.$fileName;

    move_uploaded_file($fileTmpName, $file_store);

    
    if (empty($projname) || empty($projdesc) || empty($projid) || empty($duedate))
    {
        header("Location: ../Professors/projects.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
                
        $query = "UPDATE `projects` SET `projname`='".$projname."', `projdesc`='".$projdesc."',  `duedate`='".$duedate."', `score`='".$score."', `criteria`='".$fileName."', `filesize`='".$fileSize_mb."' WHERE `id` = $projid";
                
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
                header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&edit_project=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject");
    exit();
}