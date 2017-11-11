<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once('sendMail.php');
require_once('mySqlHelper.php');

$mySQL = new mySqlHelper();
if ($_POST['send_form']) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];
  $avatar = $_FILES['avatar'];
  move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/uploaded_images/' . $_FILES["avatar"]['name']);

  $myMail = new sendMail($email, 'Message ', 'Hello ' . $name . '!', 'admin.test@gmail.com');
 // require_once __DIR__ . '/vendor/autoload.php';

  //require 'PHPMailer/composer.phar/vendor/autoload.php';


  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
    //Server settings

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('anzhelica.protsenko@gmail.com', 'Joe User');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  }




  /*if ($myMail->send()) {
    if ($mySQL->AddUserInDB($name, $surname, $email, $comment, $avatar))
      $mySQL->login($name, $surname, $email);
    header("location:home.php");
  } else {
    echo '<p>' . "Error!" . '</p>';
  }*/
}


