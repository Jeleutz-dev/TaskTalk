<?php

if (isset($_POST['Add-Subj']))
{

    require 'dbh.inc.php';


    $action = $_POST['actions'];
    $course= $_POST['course'];
    $section= $_POST['section'];
    $subjectt= $_POST['subjt'];
    $subjectu= $_POST['subju'];
    $subjects= $_POST['subjs'];
    $subject= $_POST['subjc'];
    $userName = $_POST['user'];

    if (empty($subject))
    {
        header("Location: ../Admin/dashboard.php?projname=?error=emptyfields&uid=");
        exit();
    }

    else
    {
        $sql = "insert into subject(subject_code, subject_title, unit, semester)"
                . "values (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Admin/subjects.php?error=sqlerror");
            exit();
        }
        else
        {

            mysqli_stmt_bind_param($stmt, "ssss", $subject, $subjectt, $subjectu, $subjects);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Admin/subjects.php?error=sqlerror");
                exit();
            }
            else
            {

            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Admin/subjects.php?success");
            exit();
            }

        }


    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

else
{
    header("Location: ../Admin/subjects.php");
    exit();
}
