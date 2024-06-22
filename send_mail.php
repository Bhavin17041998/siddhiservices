<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your_gmail_address@gmail.com'; // Your Gmail address
    $mail->Password = 'your_gmail_password'; // Your Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('your_gmail_address@gmail.com', 'Your Name');
    $mail->addAddress('bhavinkumar318@gmail.com', 'Bhavin'); // Add a recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test email';
    $mail->Body    = 'This is a test email.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
