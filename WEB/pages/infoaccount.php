<?php
include('stampa.php');
$username = $_SESSION['Username'];
if ($_SESSION['tipo'] == "P")
    $sql = "SELECT Nome,Cognome,Sesso,Comune,DataN,Stato,Email,Telefono,Username,CF FROM utenti WHERE Username='$username'";
else $sql = "SELECT Nome,Cognome,Sesso,Comune,DataN,NM,Email,Telefono,Username FROM medici WHERE Username='$username'";
$rs = MySqli_query($con, $sql);
$row = MySqli_fetch_row($rs);
echo "<center><h1><font color=#CD23CD>Info sul profilo</font></h1></center><br>";
echo "<form action='?page=updateInfo.php' method='POST'>";
echo "<fieldset>";
echo "<legend><h3>Puoi modificare solo i dati non anagrafici </h3></legend>";
echo "<div class='form-group'>";
echo " <label for='Username'>Username</label>";
echo "  <input type='text' class='form-control' id='Username'  name='Username' value='$row[8]' required>";
echo " </div>";
if ($_SESSION['usernameesistente'] == 1) {
    echo "<br><div class='alert alert-dismissible alert-danger'>";
    echo " <button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo " <strong>ERRORE!</strong>Questo username è stato gia preso";
    echo " </div><br>";
}
echo " <div class='form-group'>";
echo "   <label for='Nome'>Nome</label>";
echo "  <input type='text' class='form-control' id='Nome'  name='Nome' value='$row[0]'  readonly>";
echo "  </div>";

echo "  <div class='form-group'>";
echo "    <label for='Cognome'>Cognome</label>";
echo "    <input type='text' class='form-control' id='Cognome'  name='Cognome' value='$row[1]'  readonly>";
echo " </div>";





echo "  <div class='form-group'>";
echo "      <label for='Città'> Città di nascita</label>";
echo "      <input id='cittanascita' type='text' class='form-control' value='$row[3]'  readonly>";

echo "   </div>";


echo " <div class='form-group'>";
echo "     <label for='DataNascita'>Data di nascita</label>";
echo "<input id='txtdate' type='text' class='form-control' name='cal' min='1900-01-01' value='$row[4]'  readonly>";
echo "  </div>";

echo "  <div class='form-group'>";
echo "      <label for='Sesso'>SESSO</label>";
echo " <input id='sesso' type='text' class='form-control' readonly        value='$row[2]' >";
echo "  <div>";

if ($_SESSION['tipo'] == "P") {
    
echo "  <div class='form-group'>";
echo "      <label for='CF'>Codice Fiscale</label>";
echo " <input id='cf' type='text' class='form-control' readonly        value='$row[9]' >";
echo "  <div>";

    echo "  <div class='form-group'>";
    echo "      <label for='Stato'>Stato di immunità</label>";
    if ($row[5] == 0) echo " <input id='stato' type='text' class='form-control' readonly  value='NON PROTETTO' >";
    else echo " <input id='stato' type='text' class='form-control' readonly  value='PROTETTO' >";
    echo "  <div>";
} else {
    echo "  <div class='form-group'>";
    echo "      <label for='Matricola'>Numero di matricola</label>";
    echo " <input id='nm' type='text' class='form-control' readonly  value='$row[5]' >";
    echo "  <div>";
}

echo " <div class='form-group'>";
echo "   <label for='Email'>Email</label>";
echo "   <input type='email' class='form-control' id='Email' name='Email' value='$row[6]' required>";
echo " </div>";

echo " <div class='form-group'>";
echo "      <label for='Telefono'>Telefono</label>";
echo "      <input type='tel' class='form-control' id='Telefono'  name='Telefono' value='$row[7]'  required>";
echo "  </div>";

echo "      <button type='submit' class='btn btn-primary'>Conferma</button>";
echo "      <button type='reset' class='btn btn-primary'>Svuota campi</button>";
echo "  </div>";
echo "  </fieldset>";
echo "</form><br><br>";
?>

Per modificare la tua password clicca <a href="?page=logout.php">qui</a> per eseguire il logout e cliccare su recuperare/modifica password