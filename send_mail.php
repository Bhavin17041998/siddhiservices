<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = "Service Enquiry";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'bhavin17.panchal@gmail.com'; // Your Gmail address
        $mail->Password = 'mtdn ngis ejfe kcjo'; // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('bhavin17.panchal@gmail.com', 'Bhavin Panchal');
        $mail->addAddress('bhavinkumar318@gmail.com', 'Bhavin'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        
        // Body with h1 tag and parameters
        $mail->Body = "
        <h1>$title</h1>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong> $message</p>
        ";

        $mail->send();
        if($_POST['redirect'] == 'contact'){
            header('Location: contact.html?success=true');
        }else if($_POST['redirect'] == 'quote'){
            header('Location: quote.html?success=true');
        }else{
            header('Location: index.html?success=true');
        }
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
