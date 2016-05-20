<?php
/**
 *
 */
 require_once 'PHPMailerAutoload.php';
class Mail
{

  function __construct()
  {
    # code...
  }

  function Send($to ,$subject, $message){
    $mail = new PHPMailer();

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'pruebadatabase@gmail.com';
    $mail->Password = 'Nintendop3p';
    $mail->SMTPSecure = 'tls';



    $mail->setFrom('pruebadatabase@gmail.com', 'Vive mi Nicaragua');
    $mail->addReplyTo('pruebadatabase@gmail.com', 'Vive mi Nicaragua');
    $mail->Subject = $subject;



    //$bodyContent = $message;


    // $mail->IsHTML(true);
    // $mail->Body = $message;
    $mail->CharSet="utf-8";

    $mail->MsgHTML($message);
      // Set email format to HTML
    $mail->addAddress($to);   // Add a recipient

    //
    // if (!$mail->send()) {
    //     // echo 'Message could not be sent.';
    //     // echo 'Mailer Error: '.$mail->ErrorInfo;
    // } else {
    //     // echo 'Message has been sent';
    // }

    return $mail->send();
  }
}



 ?>
