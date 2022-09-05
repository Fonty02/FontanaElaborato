<?php


use PHPMailer\PHPMailer\PHPMailer;

  
  require_once("PHPMailer/PHPMailer.php");
  require_once("PHPMailer/SMTP.php");
  require_once("PHPMailer/Exception.php");
  $subject="CERTIFICATO";
  $email=$_GET['email'];
  $confR=$_GET['confR'];
  $sesso=$_GET['s'];
  $pdf=$_GET['at'];
  $body=null;
  if ($sesso=="Maschile") $body="COMPLIMENTI. SEI VACCINATO CONTRO IL COVID.<br> Accedi alla piattaforma per scaricare il tuo certificato o scaricalo in questa mail<br>";
  else  $body="COMPLIMENTI. SEI VACCINATA CONTRO IL COVID.<br> Accedi alla piattaforma per scaricare il tuo certificato";

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
  $mail->AltBody="<br>";
  $parti=$pdf=explode('/',$pdf);
  $pdfPath=$parti[1]."/".$parti[2];
  $mail->addAttachment('../'.$pdfPath); 
  echo $pdfPath;
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

  if ($confR==1) header("Location: ../index.php?page=confReg.php");
  else header ("Location: ../index.php?page=homepage.php");
?>
