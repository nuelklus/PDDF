<?php
// use PHPMailer\PHPMailer\PHPMailer;
// require 'vendor/autoload.php';
// $mail = new PHPMailer;
// $mail->isSMTP();
// $mail->SMTPDebug = 2;
// $mail->Host = 'smtp.hostinger.com';
// $mail->Port = 587;
// $mail->SMTPAuth = true;
// $mail->Username = 'test@hostinger-tutorials.com';
// $mail->Password = 'YOUR PASSWORD HERE';
// $mail->setFrom('test@hostinger-tutorials.com', 'Your Name');
// $mail->addReplyTo('test@hostinger-tutorials.com', 'Your Name');
// $mail->addAddress('example@email.com', 'Receiver Name');
// $mail->Subject = 'Testing PHPMailer';
// $mail->msgHTML(file_get_contents('message.html'), __DIR__);
// $mail->Body = 'This is a plain text message body';
// //$mail->addAttachment('test.txt');
// if (!$mail->send()) {
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'The email message was sent.';
// }

$to = 'icnoka@gmail.com';
$subject = 'Jobs Proposal';
$message = 'Hi, another test email.'; 
$from = 'Jobs@hrfocusuniverse.com';
  
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}

?>