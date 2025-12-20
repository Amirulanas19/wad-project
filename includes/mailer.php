<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendEmail($to, $name, $subject, $bodyContent) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'fitflow.unimas.demo@gmail.com'; // Use your App Password
        $mail->Password   = 'abcd 1234 efgh 5678'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('no-reply@fitflow.com', 'FitFlow Team');
        $mail->addAddress($to, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyContent; 

        $mail->send();
        return ["status" => "success", "message" => "Email sent"];
    } catch (Exception $e) {
        return ["status" => "error", "message" => "Error: {$mail->ErrorInfo}"];
    }
}
?>
