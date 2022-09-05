<?php
$username = $_POST['username'];
$email = $_POST['email'];
if (isset($_POST['tipo'])) $tipo = "M";
else $tipo = "P";
$_SESSION['tipo']=$tipo;

$sql = null;

use PHPMailer\PHPMailer\PHPMailer;

if ($tipo=="M") $sql = "SELECT count(*) as tot from `medici` WHERE `Username`='$username' AND `Email`='$email'";
else $sql = "SELECT count(*) as tot from `utenti` WHERE `Username`='$username' AND `Email`='$email'";
$rs = mysqli_query($con, $sql) or die ("NON TE TROVO");
$num = mysqli_fetch_assoc($rs);
$righe = $num['tot'];
if ($righe > 0) {
  $_SESSION['errorerecp']=0;
  $subject = "Codice di verifica";
  $numero = null;
  $numero .= rand(1, 9);
  for ($i = 0; $i < 5; $i++) $numero .= rand(0, 9);
  $body = "Il tuo codice e' " . $numero;
  if ($tipo=="M") $sql = "UPDATE `medici` SET `OTPCode`='$numero' WHERE `Username`='$username'";
  else  $sql = "UPDATE `utenti` SET `OTPCode`='$numero' WHERE `Username`='$username'";
  $rs = mysqli_query($con, $sql) or die ("NON FA UPDATE");
  require_once("PHPMailer/PHPMailer.php");
  require_once("PHPMailer/SMTP.php");
  require_once("PHPMailer/Exception.php");

  $mail = new PHPMailer();

  //SMTP Settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "insertYourEmail";
  $mail->Password = 'insertYourEmailPassword';
  $mail->Port = 465; //587
  $mail->SMTPSecure = "ssl"; //tls

  //Email Settings
  $mail->isHTML(true);
  $mail->setFrom("insertYourEmail", "GestioneVaccini");
  $mail->addAddress($email);
  $mail->Subject = $subject;
  $mail->Body = $body;
  if ($mail->send()) {
    $inviata = true;
  } else {
    $status = "Fallito";
    $response = "Qualcosa non e' andato a buon fine: <br><br>" . $mail->ErrorInfo;
    $inviata = false;
  }
  if ($inviata) {
    ?>
    <form action="?page=nuovapass.php" method="POST">
    <fieldset>
        <h2><center>CONTROLLA LA TUA EMAIL</center></h2>
        <div class="form-group">
            <label for="OTPCODE">CODICE OTP</label>
            <input type="number" class="form-control" id="OTP" placeholder="CodiceOTP" name="OTP" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Conferma</button>
            <button type="reset" class="btn btn-primary">Svuota campi</button>
        </div>
    </fieldset>
</form>
   <?php
   $_SESSION['username']=$username;
  }
} else

{
  $_SESSION['errorerecp']=1;
  header('Location: ?page=recpass.php');
}
?>





