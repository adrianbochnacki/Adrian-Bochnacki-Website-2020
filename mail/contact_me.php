<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);


if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

try {
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
  $mail->isSMTP();                           // Send using SMTP
  $mail->Host       = 'smtp.gmail.com';      // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                  // Enable SMTP authentication
  $mail->Username   = '??????';  // SMTP username
  $mail->Password   = '??????';               // SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  $mail->Port       = 587;                  // TCP port to connect to

  $mail->setFrom($email, $name); //Sender E-mail
  $mail->addAddress('????');     // Add a recipient
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  // Content
  $mail->isHTML(true);   //For sending HTML content

  $mail->Subject = 'Enquery';   //E-Mail Subject
  $mail->Body    = 'Name : '.$name.'<br>Phone : '.$phone.'<br>Email : '.$email.'<br>Has written : '.$message;   //E-Mail body

  $mail->send();
  
  } 
  catch (Exception $e) {
    
  }

?>
