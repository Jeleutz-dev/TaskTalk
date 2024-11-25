<?php

if (isset($_POST['login-submit']))
{
    
    require 'dbh.inc.php';
    
    $userName = $_POST['uid'];
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $action = $_POST['action'];
    
    if (empty($mailuid) || empty($password))
    {
        header("Location: ../s-login.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM user WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../s-login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result))
            {  
                
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false)
                {
                    header("Location: ../s-login.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['emailUsers'] = $row['emailUsers'];
                    $_SESSION['f_name'] = $row['f_name'];
                    $_SESSION['l_name'] = $row['l_name'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['course'] = $row['course'];
                    $_SESSION['section'] = $row['section'];
                    $_SESSION['headline'] = $row['headline'];
                    $_SESSION['bio'] = $row['bio'];
                    $_SESSION['userImg'] = $row['userImg'];
                    $sub_query = "
                    INSERT INTO login_details 
                    (user_id) 
                    VALUES ('".$row['idUsers']."')
                    ";
                    $statement = $conn->prepare($sub_query);
                    mysqli_stmt_execute($statement);
                    mysqli_stmt_store_result($statement);
                    $_SESSION['login_details_id'] = $statement->insert_id;
                    
                    $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../p-index.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                    
                    mysqli_stmt_bind_param($que, "ss", $row['uidUsers'], $action);
                    mysqli_stmt_execute($que);
                    mysqli_stmt_store_result($que);

                    header("Location: ../Students/Dashboard.php?login=success");
                    exit();
                    }                  
                }
                else
                {
                    header("Location: ../s-login.php?error=wrongpwd");
                    exit();
                }
            }
            else
            {
                header("Location: ../s-login.php?error=nouser");
                exit();
            }
        }
    }
    
}
 else 
{
    header("Location: ../s-login.php");
    exit();
}