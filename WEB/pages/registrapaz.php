<?php
include("stampa.php");
?>
<form action="?page=confregpaz.php" method="POST">
    <fieldset>
        <legend>REGISTRAZIONE DI UN PAZIENTE</legend>
        <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="Nome" placeholder="Nome" name="Nome" required>
        </div>

        <div class="form-group">
            <label for="Cognome">Cognome</label>
            <input type="text" class="form-control" id="Cognome" placeholder="Cognome" name="Cognome" required>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" placeholder="Email" name="Email" required>
        </div>

        <div class="form-group">
            <label for="Telefono">Telefono</label>
            <input type="tel" class="form-control" id="Telefono" placeholder="Telefono" name="Telefono" required>
        </div>


        <div class="form-group">
            <label for="Città"> Città di nascita</label>
            <select class="form-control" id="Città" name="comune">
                <?php $sql = "SELECT `city_name` FROM `cities` ORDER BY `city_name`";
                $rs = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_row($rs)) {
                    echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                }
                ?>
            </select>
        </div>


        <div class="form-group">
            <label for="DataNascita">Data di nascita</label>
            <input id="txtdate" type="date" class="form-control" name="cal" min="1900-01-01" required>
        </div>

        <div class="form-group">
            <label for="Sesso">SESSO</label>
            <select class="form-control" name="sesso">
                <option value="Maschile">Maschile</option>
                <option value="Femminile">Femminile</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ProblemiSalue">Problemi di salute</label>
            <textarea class="form-control" id="ProblemiSalute" rows="3" spellcheck="false" name="patologie" placeholder="Inserire qui eventuali patologie e problemi di salute" style="margin-top: 0px; margin-bottom: 0px; height: 111px; resize:none;"></textarea>
        </div>


        <div class="form-group">
            <label for="Vaccino">Vaccino</label>
                <?php
                $sql = "SELECT lotti.CodiceLotto AS 'Codice del lotto', vaccini.Nome AS Vaccino FROM lotti INNER JOIN vaccini on lotti.Vaccino=vaccini.CodiceVaccino AND lotti.NumeroDosi>0";
                $rs = MySqli_query($con, $sql) or die("Query fallita");
                StampaLotti2($rs);
                ?>
        </div>

        <div class="form-group">
            <label for="DataVaccino">Data di vaccinazione (1 dose)</label>
            <input id="txtdate2" type="date" class="form-control" name="dose1" min="1900-01-01" required>
        </div>


        <div>
            <button type="submit" class="btn btn-primary">Conferma</button>
            <button type="reset" class="btn btn-primary">Svuota campi</button>
        </div>
    </fieldset>
</form><br>



<img src="./images/utente.jpg" value="./images/utente.jpg" width="25%" height="10%" />




<script language="javascript">
    function showPwd() {
        var input = document.getElementById("Password");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }



    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("txtdate").setAttribute("max", today);
    document.getElementById("txtdate2").setAttribute("max", today);
</script>