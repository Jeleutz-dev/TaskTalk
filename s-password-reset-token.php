<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if (isset($_POST["password-reset-token"]))
{ 
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $expires = date("U") + 1800;

    $url = "http://17ae-136-158-31-236.ngrok.io/TaskTalk3/s-reset-password.php?selector=" . $selector . "&validator=" . bin2hex($token) . "&expire=" . $expires;


    require 'includes/dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM passreset WHERE passResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $userEmail);
      mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO passreset (passResetEmail, passResetSelector, passResetToken, passResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

  require 'PHPMailer/src/PHPMailerAutoload.php';
	$mail = new PHPMailer(true);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
      exit();
    } else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
	  $subject = 'Reset your password!';
    $to = $userEmail;
	  try{
		
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com'; //dapat mayroon to                   // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'wearejjjam@gmail.com';   //or lagay ka username mamaya  //may username din to                // SMTP username
			$mail->Password   = 'wejjjam2021';                     // SMTP password
			$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587; //sample lang yung port depende yan sa provider ng email services     
			$mail->setFrom('dnc.jerusa@gmail.com', 'TaskTalk');
			$mail->addAddress($to, $userEmail);
			$mail->Subject = $subject;
			$mail->isHTML(true);  
	
    $message = '<p>We received a password reset request. The link to reset your password is below, if you did not make this request, 
    you can ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' .$url . '">' . $url . '</a></p>';
	
	  $mail->Body = $message;
	  $mail->send();

    //mail($to, $subject, $message, $headers);

    header("Location: s-forgot-password.php?reset=success");
	  } catch(Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
} else {
  header("Location: s-login.php");
}