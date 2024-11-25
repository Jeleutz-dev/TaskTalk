<?php

if (isset($_POST['signup-submit']))
{
    
    require 'dbh.inc.php';
    
    
    $userName = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat  = $_POST['pwd-repeat'];
    $gender = $_POST['gender'];
    $headline = $_POST['headline'];
    $bio = $_POST['bio'];
    $f_name = $_POST['f-name'];
    $l_name = $_POST['l-name'];
    $action = $_POST['action'];
    $usertype = "faculty";
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat) || empty($f_name) || empty($l_name))
    {
        header("Location: ../p-signup.php?error=emptyfields&uid=".$userName."&mail=".$userName);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../p-signup.php?error=invalidmailuid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../p-signup.php?error=invalidmail&uid=".$userName);
        exit();
    }
    
    else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("Location: ../p-signup.php?error=invalidpassword");
        exit();
    }
    else if ($password !== $passwordRepeat)
    {
        header("Location: ../p-signup.php?error=passwordcheck&uid=".$userName."&mail=".$email);
        exit();
    }
    else
    {
        // checking if a user already exists with the given username
        $sql = "SELECT uidUsers FROM user WHERE userType='faculty' AND uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../p-signup.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                header("Location: ../p-signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else
            {
                $FileNameNew = 'default.png';
                require 'upload.inc.php';
                
                $sql = "insert into user(f_name, l_name, uidUsers, emailUsers, pwdUsers, gender, "
                        . "headline, bio, userImg, userType) "
                        . "values (?,?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../p-signup.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    
                    mysqli_stmt_bind_param($stmt, "ssssssssss", $f_name, $l_name, $userName, $email,
                            $hashedPwd, $gender,
                            $headline, $bio, $FileNameNew, $usertype);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    
                }
            }
        }
    }
    // Insert into Activity_Log
    $sql = "insert into activity_log(uidUsers, action) "
    . "values (?,?)";
    $que = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($que, $sql))
    {
        header("Location: ../p-signup.php?error=sqlerror");
        exit();
    }
    else
    {
    
    mysqli_stmt_bind_param($que, "ss", $userName, $action);
    mysqli_stmt_execute($que);
    mysqli_stmt_store_result($que);
    
    header("Location: ../p-signup.php?signup=success");
    exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

else
{
    header("Location: ../p-signup.php");
    exit();
}