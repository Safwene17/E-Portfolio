<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address (recipient)
    $to = "safwenenacheb17@gmail.com";

    // Subject of the email
    $email_subject = "New Message from Contact Form: $subject";

    // Message body
    $email_body = "You have received a new message from $name.\n\n".
                  "Email: $email\n\n".
                  "Message:\n$message\n";

    // Headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "There was a problem sending the email.";
    }
}
?>
