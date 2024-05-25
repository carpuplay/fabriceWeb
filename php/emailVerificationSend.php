<?php

// Generate a random confirmation code
$confirmationCode = generateConfirmationCode();

// Send the confirmation email
sendConfirmationEmail($userEmail, $confirmationCode);

// Function to generate a random confirmation code
function generateConfirmationCode() {
    return md5(uniqid());
}

// Function to send the confirmation email
function sendConfirmationEmail($email, $code) {
    // Send the email
    $mail = new PHPMailer();
    $mail->setFrom('noreply@example.com', 'Your Website');
    $mail->addAddress($email);
    $mail->Subject = 'Email Confirmation';
    $mail->Body = 'Please click the following link to confirm your email: http://localhost/fabriceWeb/confirm.php?code=' . $code;
    $mail->send();
    */
}

?>