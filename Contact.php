<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader or manually require PHPMailer files
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;              // Enable SMTP authentication
        $mail->Username   = 'your_email@gmail.com'; // Your Gmail address
        $mail->Password   = 'your_app_password';    // App password generated from Google
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;                // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);          // Form sender's email and name
        $mail->addAddress('safwenenacheb17@gmail.com'); // Your email where you want to receive messages

        // Email content
        $mail->isHTML(true);                     // Set email format to HTML
        $mail->Subject = "New Contact Message: $subject";
        $mail->Body    = nl2br($message);        // Convert new lines to <br> tags for HTML email
        $mail->AltBody = strip_tags($message);   // Plain text version for non-HTML email clients

        // Send the email
        $mail->send();
        echo 'Your message has been sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
