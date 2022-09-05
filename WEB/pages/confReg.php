<?php


use PHPMailer\PHPMailer\PHPMailer;

  
  require_once("PHPMailer/PHPMailer.php");
  require_once("PHPMailer/SMTP.php");
  require_once("PHPMailer/Exception.php");
  $subject="REGISTRAZIONE";
  $email=$_SESSION['emailpaz'];
  $username=$_SESSION['usernamepaz'];
  $password=$_SESSION['passwordpaz'];
  $body="COMPLIMENTI. TI SEI REGISTRATO CORRETTAMENTE<br>Il tuo username è '$username' mentre la tua password temporanea è '$password'.<br>Potrai cambiare la password in qualasiasi momento.";

  $mail = new PHPMailer();

  //SMTP Settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "YourEmail";
  $mail->Password = 'Password';
  $mail->Port = 465; //587
  $mail->SMTPSecure = "ssl"; //tls

  //Email Settings
  $mail->isHTML(true);
  $mail->setFrom("YourEmail", "EmanueleFontanaSito");
  $mail->addAddress($email);
  $mail->Subject = $subject;
  $mail->Body = $body;
  if ($mail->send()) {
    $status = "Eseguito!";
    $response = "Controlla la tua casella email!";
    $inviata = true;
  } else {
    $status = "Fallito";
    $response = "Qualcosa non e' andato a buon fine: <br><br>" . $mail->ErrorInfo;
    echo $email;
    $inviata = false;
  }
  echo $status . " " . $response . "<br><br>";
  if ($inviata) {
    unset($_SESSION['emailpaz']);
    unset($_SESSION['usernamepaz']);
    unset($_SESSION['passwordpaz']);
    $newpage="?page=registrapaz.php";
    header('Refresh: 10; url=' . $newpage);
    echo "</center><h1>Registrazione avvenuta con successo</h1></center><br>Tra 10 secondi verrai reindirizzato al form di registrazione paziente. Se non vuoi aspettare <a href='$newpage'>clicca qui</a>";


  }
