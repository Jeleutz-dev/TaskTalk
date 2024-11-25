<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST["name"]) && isset($_POST["email"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/PHPMailerAutoload.php';

    //smtp settings
    $mail = new PHPMailer(true);

    try{

        $mail->IsSMTP();
        $mail->Mailer = "smtp";

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = TRUE;
        $mail->Username = "wearejjjam@gmail.com";
        $mail->Password = "wejjjam2021";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

        //email settings
        $mail->IsHTML(true);
        $mail->SetFrom($email, $name);
        $mail->AddAddress("wearejjjam@gmail.com");
        $mail->Subject = ("$email ($subject)");
    
        $status = "Successful!";
        $response = "Email is sent!";
        
        $mail->Body = $message;
        $mail->send();

    } catch(Exception $e) {
        $status = " failed";
        $response = "Something is wrong: " . $mail->ErrorInfo;

    } exit($status . "<br>" . $response); 

} else {
    header("Location: index.php");
}