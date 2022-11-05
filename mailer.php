<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
    // Sending Data
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'message' => $_POST['message'],
    ];

    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'p3plzcpnl489472.prod.phx3.secureserver.net'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'mailer@lamaryarasoft.com'; // SMTP username
    $mail->Password = '(fYf6e=QbyA0'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    //Recipients
    $mail->setFrom($data['email'], $data['email']);
    $mail->addAddress('info@lamaryarasoft.com', 'Info');
    $mail->addReplyTo($data['email'], $data['email']);

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'You have new Contact Request ' . $data['email'];
    $mail->Body = "Hello, my name is: <strong>{$data['name']}</strong><br>
                    My Email is: <strong>{$data['email']}</strong><br>
                    My Phone is: <strong>{$data['phone']}</strong><br>
                    Message: <strong>{$data['message']}</strong>";

    $mail->AltBody = "Hello, my name is: {$data['name']}
                    My Email is: {$data['email']}
                    My Phone is: {$data['phone']}
                    Message: {$data['message']}";

    $mail->send();

    echo 'Message has been sent';
    http_response_code(200);
} catch (Exception $e) {
 //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo "Failed to Send Message";
    http_response_code(500);
}

// header("Location: https://lamaryarasoft.com");
// die();
