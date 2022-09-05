

<form action="?page=conflogin.php" method="POST">
    <fieldset>
        <legend>LOGIN</legend>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" placeholder="Username" name="username" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" placeholder="Password" autocomplete="current-password" name="password" required>
            <button type="button" onClick="showPwd()"><i class='bx bx-low-vision'></i></button><br>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="Immagine" onclick="changeImage()" name="tipo">
            <label class="custom-control-label" for="Immagine">SEI UN MEDICO?</label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Conferma</button>
            <button type="reset" class="btn btn-primary">Svuota campi</button>
        </div>
    </fieldset>
</form><br>

Hai dimenticato la password o vuoi modificarla??<br>
Clicca <a href="?page=recpass.php">qui</a> per recuperarla/modificarla<br>

<?php
if ($_SESSION['errorelogin']==1)
{
    echo "<div class='alert alert-dismissible alert-danger'>";
   echo " <button type='button' class='close' data-dismiss='alert'>&times;</button>";
   echo " <strong>ERRORE!</strong> Non hai inserito le credenziali corrette";
 echo " </div><br>";
}


?>


<img src="./images/utente.jpg" value="./images/utente.jpg" id="imgUserType" width="25%" height="10%" />




<script language="javascript">
    function changeImage() {
        var utente = "./images/utente.jpg";
        var medico = "./images/medico.jpg";
        if (document.getElementById("imgUserType").value == "./images/medico.jpg") {
            document.getElementById("imgUserType").src = utente;
            document.getElementById("imgUserType").value = utente;
        } else {
            document.getElementById("imgUserType").src = medico;
            document.getElementById("imgUserType").value = medico;
        }
    }

    function showPwd() {
        var input = document.getElementById("Password");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>