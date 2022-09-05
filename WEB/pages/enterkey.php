<form action="?page=ris.php" method="POST">
    <fieldset>
        <legend>Informazioni sui pazienti</legend>
        <div class="form-group">
            <label for="Key">Chiave</label>
            <input type="text" class="form-control" id="Key" placeholder="Chiave" name="key" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Conferma</button>
            <button type="reset" class="btn btn-primary">Svuota campi</button>
        </div>
    </fieldset>
</form>

<?php
if ( $_SESSION['errorekey']==1) {
   
    echo "<div class='alert alert-dismissible alert-danger'>";
   echo " <button type='button' class='close' data-dismiss='alert'>&times;</button>";
   echo " <strong>ERRORE!</strong> La chiave inserita non è corretta";
 echo " </div><br>";
}
if (isset($_POST['paz'])) $_SESSION['paz'] = $_POST['paz'];
else
{
if ($_POST['paz2']!=null) {
    $paz=$_POST['paz2'];
    $string=explode('->',$paz);
    $paziente=$string[1];
    $_SESSION['paz'] =$paziente;
}
else
{ 
    header('Location: ?page=sceglipaz.php');
}
}

?>
