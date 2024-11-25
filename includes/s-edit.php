<?php
session_start();

if (isset($_POST['update-profile']))
{
    
    require 'dbh.inc.php';
    
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $f_name = $_POST['f-name'];
    $l_name = $_POST['l-name'];
    $oldPassword = $_POST['old-pwd'];
    $password = $_POST['pwd'];
    $passwordRepeat  = $_POST['pwd-repeat'];
    $gender = $_POST['gender'];
    $headline = $_POST['headline'];
    $bio = $_POST['bio'];
    
    
    if (empty($email))
    {
        header("Location: ../Students/page-profile.php?error=emptyemail");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../Students/page-profile.php?error=invalidmail");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM user WHERE usertype='student' AND uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Students/page-profile.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
           
            
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdChange = false;
                
                if( (!empty($password) || !empty($passwordRepeat)) && empty($oldPassword))
                {
                    header("Location: ../Students/page-profile.php?error=emptyoldpwd");
                    exit();
                }
                if( empty($password) && empty($passwordRepeat) && !empty($oldPassword))
                {
                    header("Location: ../Students/page-profile.php?error=emptynewpwd");
                    exit();
                }
                if (!empty($password) && empty($passwordRepeat) && !empty($oldPassword))
                {
                    header("Location: ../Students/page-profile.php?error=emptyreppwd");
                    exit();
                }
                if (empty($password) && !empty($passwordRepeat) && !empty($oldPassword))
                {
                    header("Location: ../Students/page-profile.php?error=emptynewpwd");
                    exit();
                }
                if (!empty($password) && !empty($passwordRepeat) && !empty($oldPassword))
                {
                    $pwdCheck = password_verify($oldPassword, $row['pwdUsers']);
                    if ($pwdCheck == false)
                    {
                        header("Location: ../Students/page-profile.php?error=wrongpwd");
                        exit();
                    }
                    if ($oldPassword == $password)
                    {
                        header("Location: ../Students/page-profile.php?error=samepwd");
                        exit();
                    }
                    if ($password !== $passwordRepeat)
                    {
                        header("Location: ../Students/page-profile.php?error=passwordcheck&mail=".$email);
                        exit();
                    }
                    $pwdChange = true;
                }
                

                    $FileNameNew = $_SESSION['userImg'];
                    require 'upload.inc.php';
                    
                    $sql = "UPDATE user "
                            . "SET f_name=?, "
                            . "l_name=?, "
                            . "uidUsers=?, "
                            . "emailUsers=?, "
                            . "gender=?, "
                            . "headline=?, "
                            . "bio=?, "
                            . "userImg=? ";
                    
                    if ($pwdChange)
                    {
                        $sql .= ", pwdUsers=? "
                                . "WHERE userType='student' AND uidUsers=?;";
                    }
                    else
                    {
                        $sql .= "WHERE userType='student' AND uidUsers=?;";
                    }
                    
                    
                    $stmt = mysqli_stmt_init($conn);
                    
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../Students/page-profile.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        if ($pwdChange)
                        {
                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ssssssssss", $f_name, $l_name, $uid, $email,
                                $gender, $headline, $bio, 
                                $FileNameNew, $hashedPwd, $uid);
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "sssssssss", $f_name, $l_name, $uid, $email,
                                $gender, $headline, $bio, 
                                $FileNameNew, $uid);
                        }
                        

                        
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        
                        $_SESSION['userUid'] = $uid;
                        $_SESSION['emailUsers'] = $email;
                        $_SESSION['f_name'] = $f_name;
                        $_SESSION['l_name'] = $l_name;
                        $_SESSION['gender'] = $gender;
                        $_SESSION['headline'] = $headline;
                        $_SESSION['bio'] = $bio;
                        $_SESSION['userImg'] = $FileNameNew;

                        header("Location: ../Students/page-profile.php?edit_profile=success");
                        exit();
                    }
                
            }
            else 
            {
                header("Location: ../Students/page-profile.php?error=sqlerror");
                exit();
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Students/page-profile.php");
    exit();
}