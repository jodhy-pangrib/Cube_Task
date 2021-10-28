<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/SMTP.php';

    function send($email,$token) {
        $mail = new PHPMailer(true);
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'dummywebuajy@gmail.com';                     //SMTP username
            $mail->Password   = 'dummyweb234';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('dummywebuajy@gmail.com', 'Cube Task');
            $mail->addAddress($email);  

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification';
            $mail->Body    = "<a href='http://cubetask.epizy.com/page/login.php?token=$token'>Register Account</a>";

            $mail->send();
    }
?>