<?php
function Send_Mail($to, $subject, $body)
{
    require 'class.phpmailer.php';
    $from = "admin@cubition.com";

    $mail = new PHPMailer();
    $mail->IsSMTP(true);            // use SMTP
    $mail->IsHTML(true);
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Host = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
    $mail->Port = 465;                    // set the SMTP port
    $mail->Username = "luke.k@bukkitnode.com";  // SMTP  username
    $mail->Password = "password here";  // SMTP password
    $mail->SetFrom($from, 'Cubition | Administration');
    $mail->AddReplyTo($from, 'no-reply');
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    $mail->Send();
}

?>
