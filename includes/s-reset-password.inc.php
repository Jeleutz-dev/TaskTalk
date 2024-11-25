<?php

    $expire = $_POST["expire"];

    //echo "<script>alert('{$expire}');</script>";    

    if (isset($_POST["reset-password-submit"])) 
    {

        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        //$expire = $_GET["expire"];
        $passwordRepeat = $_POST["pwd-repeat"];

     /*   echo "<script>alert('{$expire}');</script>";

        echo "<script>alert('{$passwordRepeat}');</script>"; */
    
     if (empty($password) || empty($passwordRepeat)) {
          header("Location: s-reset-password.php?newpwd=empty");
          exit();
     } else if ($password != $passwordRepeat) {
          header("Location: s-reset-password.php?newpwd=pwdnotsame");
          exit();
     }
     

     $currentDate = date("U");

     require 'dbh.inc.php';

     $sql = "SELECT * FROM passreset WHERE passResetSelector=? AND passResetExpires >= ?";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
       echo "<script>alert('error');</script>";
       echo "There was an error!";
       exit();
     } else {
       mysqli_stmt_bind_param($stmt, "ss", $selector,$expire);
       mysqli_stmt_execute($stmt);

       $result = mysqli_stmt_get_result($stmt);
       if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to resubmit your reset request.";
            exit();
       } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["passResetToken"]);

            if  ($tokenCheck === false) {
                echo "You need to resubmit your reset request.";
                exit();
            } elseif ($tokenCheck === true) {
                
                $tokenEmail = $row['passResetEmail'];

                $sql = "SELECT * FROM students WHERE emailUsers=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "There was an error!";
                  exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                if (!$row = mysqli_fetch_assoc($result)) {
                     echo "There was an error!";
                     exit();
                } else {

                    $sql = "UPDATE students SET pwdUsers=? WHERE emailUsers=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                      echo "There was an error!";
                      exit();
                    } else {
                      $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                      mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                      mysqli_stmt_execute($stmt);

                      $sql = "DELETE FROM passreset WHERE passResetEmail=?";
                      $stmt = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "There was an error!";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../s-login.php?newpwd=passwordupdated");
                    }
                    }
                }
            }

       }
     }

    }

    } else {
        header("Location: s-login.php");
    }