<?php

require_once  'mailer/PHPMailer-master/class.phpmailer.php';
include  'mailer/PHPMailer-master/class.smtp.php';
require_once 'php/class.user.php';
$user_class = new USER();
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug  = 2;
        /*  $mail->SMTPSecure = "tls";  // ovo je za domen
         $mail->Host = "smtp.gmail.com";
         $mail->Port = 587;*/
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->AddAddress("resivojee@gmail.com"); //email unesi tvoj email
        $mail->Username = "resivojee@gmail.com"; //email
        $mail->Password = "podlogazamis"; //password
        $mail->SetFrom('resivojee@gmail.com', "Nordic Bar Malta");
        $mail->AddReplyTo('resivojee@gmail.com', "Nordic Bar Malta");
        $mail->Subject = "From: " . $email . " Subject: " . $subject;
        $mail->MsgHTML($message);
        $user_class->redirect("index.html");

        if (!$mail->Send()) {
            $user_class->returnJSON("ERROR", "Poslao si mejl ali kao");
            return false;
        } else {
            return true;
        }
