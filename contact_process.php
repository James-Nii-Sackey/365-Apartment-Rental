
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include("config/config.php");
if(isset($_POST['submit'])){
$message = mysqli_real_escape_string($mysqli, $_POST["message"]);
$name =  $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];

$insertsSql = mysqli_query($mysqli,"INSERT INTO clients (name, message, email, subject) VALUES('{$name}', '{$message}', '{$email}', '{$subject}')");
if($insertsSql){
        
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
                           //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'book-us@svwindowcleaning.ca';                     //SMTP username
        $mail->Password   = 'Enter2net$';                               //SMTP password
        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('book-us@svwindowcleaning.ca', 'SV Window Cleaning');
       
        
             //Add a recipient
                 
        $mail->addReplyTo('windowcleaningsv@gmail.com', 'Sv Window Cleaning');
        
    
           
        $confirmation_msg =  "<img width= '120' src='cid:image1'alt='svwindowlogo'> <p>Hi  $name,</p>
        <p>We've received your request for our cleaning service. We'll be in touch soon to confirm the details.</p> 
        <p>Thank you for choosing <b>SV Window Cleaning!</br></p>
        <p>Best regards,<br>SV Window Cleaning</p>";
        
        //Content
        $mail->addAddress($email, $name);
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Request Recieved!";
        $mail->Body    = $confirmation_msg;
        $mail->addEmbeddedImage('assets/img/logo/Willem_logo.webp', 'image1');
    
        $mail->send();

        //  message 
        $mail->clearAddresses();
        
        // content 2 
        
        $mail->addAddress("windowcleaningsv@gmail.com", "SV window");
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<i>Email from : $email, name : $name </i> <br>" . $message;
        $mail->send();
       header("location:contact.html");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


}

}
