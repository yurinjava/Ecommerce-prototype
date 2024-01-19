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
    $mail->Username   = 'yourmailer@test.com';                     //SMTP username
    $mail->Password   =  'your app password';                               //SMTP password
    $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', 'ProtoType Marketplace');
    $mail->addAddress('youremail@test.com', 'Admin');     //Add a recipient
    $mail->addAddress($_SESSION['user_email']);               //Name is optional
    $mail->addReplyTo('youremail@test.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('../../assets/icons/logo.png', 'foto.');         //Add attachments
    $mail->AddEmbeddedImage('../../assets/icons/logo.png', 'ProtoType.png');    //Optional name

    //Content
   
    $message = null;
   
   foreach($_SESSION['newproducts'] as $product){
    $message .= "
   
    <h3 style='color: #333;'>".$product['name']." </h3>
    <p style='color: #333;'>Quantity=".$product['quantity']."</p>
    <p style='color: #333;'>price=".$product['price']."</p>

<br>";


    };
    
    $body ="<body style='font-family: Arial, sans-serif; text-align=center;'>
    <div style='width: 80%;'>
    <img src='cid:ProtoType.png' style='width:200px; '>
    </div>
    
    <table style='width: 100% display:flex; flex-direction:column;'>
    <h2>Order - ".$_SESSION['user_name']." </h2>
        <tr>

        <td style='padding: 10px; '>
            ".$message."
        </td>
        </tr>
        <h2> Total - R$".$_SESSION['total_price']."</h2>
    </table>
</body>";
    print_r($message);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "New Order : ".$_SESSION['user_name'];
  
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(isset($_SESSION['newproducts'])){
    $mail->send();
}
    
    echo 'Message has been sent';
    unset($_SESSION['products']);
    unset($_SESSION['newproducts']);
    unset($_SESSION['total_price']);
   echo "<pre>";
   print_r($_SESSION);
   echo "</pre>";
   header('location: ../../cart.php?order=sent');

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}
