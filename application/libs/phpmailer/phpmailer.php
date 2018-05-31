<?php
namespace  libs\phpmailer;

//require_once __DIR__ . "/src/PHPMailer.php";
require __DIR__ . "/src/OAuth.php";
require __DIR__ . "/src/SMTP.php";
require __DIR__ . "/src/POP3.php";
require __DIR__ . "/src/Exception.php";



use \PHPMailer\PHPMailer\PHPMailer;
    function sendmail($Username, $Password, $SetFrom, $Subject, $Body, $AddAddress)
    {
        $mail = new PHPMailer(); // create a new object
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587; //465
        $mail->IsHTML(true);
        $mail->Username = $Username;
        $mail->Password = $Password;
        $mail->SetFrom($SetFrom);
        $mail->Subject = $Subject;
        $mail->Body = $Body;
        $mail->AddAddress($AddAddress);

        if(!$mail->Send()) {
            return ("Mailer Error: " . $mail->ErrorInfo);
        } else {
            return("Message has been sent") ;
        }
}