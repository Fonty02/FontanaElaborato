<?php
use PHPMailer\PHPMailer\PHPMailer;

  
require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/SMTP.php");
require_once("PHPMailer/Exception.php");
$persone=$_POST['utente'];
$subject="AVVISO";

foreach($persone AS $val) 
{
    $sql="SELECT Email, Sesso FROM utenti WHERE Username='$val'";
    $rs=MySqli_query($con,$sql);
    $row=MySqli_fetch_row($rs);
    $email=$row[0];
    if ($row[1]=="Maschile")
    $body="Gentilissimo $val, la informiamo che domani è previsto il richiamo per la seconda dose. La attendiamo";
    else $body="Gentilissima $val, la informiamo che domani è previsto il richiamo per la seconda dose. La attendiamo";
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

}
$sql="DROP VIEW richiami";
$rs=MySqli_query($con,$sql);
header ("Location: ?page=homepage.php");
?>