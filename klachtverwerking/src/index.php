<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'iqrafarah90@gmail.com';
    $mail->Password   = 'cpldojkdqrfiayso';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('iqrafarag90@gmail.com', 'Helpdesk');
    $mail->addAddress($email);
    $mail->addCC('iqrafarah02@hotmail.com');

    $message  =  "Naam: ". ' ' .$name . '<br>' . "Email:". ' ' . $email . '<br>' . "Bericht:". ' ' . $message;

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Uw klacht is in behandeling';
    $mail->Body    = $message;

    $mail->send();
    echo 'Bericht is verzonden';
} catch (Exception $e) {
    echo "Bericht kon niet worden verzonden. Mailerfout: {$mail->ErrorInfo}";
}
?>
