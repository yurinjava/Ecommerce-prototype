<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

session_start();

require "libs/PHPMailer/Exception.php";
require "libs/PHPMailer/DSNConfigurator.php";

require "libs/PHPMailer/OAuthTokenProvider.php";
require "libs/PHPMailer/PHPMailer.php";
require "libs/PHPMailer/POP3.php";
require "libs/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
   
    $message = null;
   
   foreach($_SESSION['newproducts'] as $product){
    $message .= "
   
    <h1 style='color: #333;'>".$product['name']." </h1>
    <p style='color: #333;'>Quantity=".$product['quantity']."</p>
    <p style='color: #333;'>Quantity=".$product['price']."</p>

<br>";


    };

    $body ="<body style='font-family: Arial, sans-serif; background-color: #f0f0f0;'>
    <table style='width: 100%;'>
    <h1>Novo Pedido ".$_SESSION['user_name']." </h1>
        <tr>
        <td style='padding: 10px; background-color: #ffffff;'>
            ".$message."
        </td>
        </tr>
    </table>
</body>";
    print_r($message);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "New Order : ".$_SESSION['user_name'];
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    unset($_SESSION['products']);
    unset($_SESSION['newproducts']);
   echo "<pre>";
   print_r($_SESSION);
   echo "</pre>";
   header('location: ../../cart.php?order=sent');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}