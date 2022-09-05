<?php
if (isset($_POST['OTP'])) {
  $code = $_POST['OTP'];
  $_SESSION['code'] = $code;
} else $code = $_SESSION['code'];
$sql=null;
$tipo=$_SESSION['tipo'];
if ($tipo=="M") $sql = "SELECT count(*) as tot from `medici` WHERE `Username`='".$_SESSION['username']."' AND `OTPCode`='$code'";
else  $sql = "SELECT count(*) as tot from `utenti` WHERE `Username`='".$_SESSION['username']."' AND `OTPCode`='$code'";
$rs = mysqli_query($con, $sql);
$num = mysqli_fetch_assoc($rs);
$righe = $num['tot'];
if ($righe > 0) {
?>
  <form name='newpass' method='post' action='?page=updatepass.php'>
    <fieldset>
    <legend>INSERISCI LA NUOVA PASSWORD</legend>
      <div class="form-group">
        <label for="NewPassowrd"> Inserisci la nuova passowrd</label>
        <input type='password'  class="form-control" name='pass' placeholder="PASSWORD" required>
        </div>
        <div class="form-group">
        <label for="ConfirmPassword">Conferma  la nuova passowrd</label>
        <input type='password'  class="form-control" name='cnfpass' placeholder="PASSWORD" required>
        </div>
        <button type="button" onClick="showPwd()"><i class='bx bx-low-vision'></i></button><br>
        <input type='submit' value='Conferma' onClick='ControlloPass()'  class="btn btn-primary"> 
        <input type='reset' value='Svuota campi'  class="btn btn-primary">
    </fieldset>
  </form>
<?php
} else {
  header ('Location: ?page=sendEmail.php');
}
?>



<script language="javascript">



function showPwd() {
    var input = document.newpass.pass;
    var input2 = document.newpass.cnfpass;
    if (input.type === "password") {
      input.type = "text";
      input2.type = "text";
    } else {
      input.type = "password";
      input2.type = "password";
    }
  }

  function ControlloPass() {

    var pass = document.newpass.pass.value;
    var cnfpass = document.newpass.cnfpass.value;


    if (!ValidaPassword(pass)) {
      document.newpass.pass.focus();
      document.newpass.action = "?page=nuovapass.php";
      document.newpass.submit();
      return false;
    }

    //Controllo uguaglianza pass e cnfpass
    else if (pass != cnfpass) {
      alert("La password confermata e' diversa da quella scelta, controllare.");
      document.newpass.pass.focus();
      document.newpass.action = "?page=nuovapass.php";
      document.newpass.submit();
      return false;
    }


    //Invio newpass
    else {
      document.newpass.action = "?page=updatepass.php";
      document.newpass.submit();
    }

  }

  function ValidaPassword(pass) {
    lunghezza = pass.length;
    if (!(pass.match(/\d/))) {
      alert("La password deve contenere almeno un numero");
      return false;
    }
    if (!(pass.match(/[A-Z]/))) {
      alert("La password deve contenere almeno una lettera maiuscola");
      return false;
    }

    if (!(pass.match(/[a-z]/))) {
      alert("La password deve contenere almeno una lettera minuscola");
      return false;
    }

    if (!(pass.match(/\W+/))) {
      alert("La password deve contenere almeno un carattere speciale");
      return false;
    }
    if (!(lunghezza >= 8)) {
      alert("La password deve contenere almeno 8 caratteri");
      return false;
    }

    return true;

  }
</script>