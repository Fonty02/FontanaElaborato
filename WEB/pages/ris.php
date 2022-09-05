<?php
include("aes.php");
include("stampa.php");
$key = $_POST['key'];
$_SESSION['key'] = $key;
$username = $_SESSION['paz'];
$rs = decrypt($key, $username, $con);
if ($rs == "LA CHIAVE INSERITA NON E' CORRETTA") {
    $_SESSION['errorekey'] = 1;
    header('Location: ?page=enterkey.php');
} else {
    echo "  <h3>";
    echo "<font color=#CD23CD>Info e aggiornamento utente</font>";
    echo "</h3>";
    $_SESSION['errorekey'] = 0;
    $row = MySqLi_fetch_row($rs);
    $problematiche = $row[0];
    $sql = "SELECT utenti.Nome, Cognome, Sesso, Comune, DataN AS 'Data di nascita', vaccini.Nome AS Vaccino, Lotto1 AS 'Lotto prima vaccinazione', Data1 AS 'Data prima vaccinazione', Lotto2 AS 'Lotto seconda vaccinazione', Data2 AS 'Data seconda vaccinazione', Stato AS Protetto FROM vaccini INNER JOIN (lotti INNER JOIN (utenti INNER JOIN lottiutenti ON lottiutenti.Utente=utenti.Username AND utenti.Username='$username') ON lotti.CodiceLotto=lottiutenti.Lotto1) ON vaccini.CodiceVaccino=lotti.Vaccino";
    $rs2 = MySqli_Query($con, $sql) or die("FALLITOOO");
    StampaInfoPaz($rs2);
?>
    <form action="?page=updatePaz.php" method="POST">
        <fieldset>
            <legend>Problematiche di salute del paziente</legend>
            Puoi aggiornare le problematiche in qualsiasi momento
        <?php
        echo "<textarea class='form-control' id='ProblemiSalute' rows='3' spellcheck='false' name='patologie' style='margin-top: 0px; margin-bottom: 0px; height: 111px; resize:none;'>$problematiche</textarea>";
    }
    $sql = "SELECT Stato FROM utenti WHERE Username='$username'";
    $rs = MySqli_query($con, $sql) or die("Selezione stato fallita");
    $row = MySqli_fetch_row($rs);
    if ($row[0] == 0) {

        ?>
            <h3>Registra seconda dose del vaccino</h3>
            <font color="red">Non è obbligatorio</font>
        <?php
        $sql = "SELECT vaccini.CodiceVaccino, lottiutenti.Data1 FROM vaccini INNER JOIN (lotti INNER JOIN (utenti INNER JOIN lottiutenti ON lottiutenti.Utente=utenti.Username AND utenti.Username='$username') ON lotti.CodiceLotto=lottiutenti.Lotto1) ON vaccini.CodiceVaccino=lotti.Vaccino";
        $rs = MySqli_query($con, $sql) or die("Query fallita");
        $row = MySqli_fetch_row($rs);
        $codiceVaccino = $row[0];

        echo "<div class='form-group'>";
        echo "  <label for='ElencoVaccini'>Vaccino</label>";
        $sql = "SELECT lotti.CodiceLotto AS 'Codice del lotto', vaccini.Nome AS Vaccino FROM lotti INNER JOIN vaccini on lotti.Vaccino=vaccini.CodiceVaccino AND lotti.NumeroDosi>0 AND vaccini.CodiceVaccino='$codiceVaccino'";
        $rs = MySqli_query($con, $sql) or die("Query fallita");
        StampaLotti3($rs);
        echo "</div>";

        echo " <div class='form-group'>";
        echo " <label for='data2Dose'>Data di vaccinazione (2 dose) METTI I CONTROLLI PER LA DATA in BASE AL VACCINO</label>";
        $sql = "SELECT Giorni FROM vaccini WHERE CodiceVaccino='$codiceVaccino'";
        $rs = MySqli_query($con, $sql) or die("Giorni falliti");
        $row = MySqli_fetch_row($rs);
        $giorni = $row[0];
        $sql = "SELECT DATE_ADD(lottiutenti.Data1,INTERVAL $row[0] DAY) from lottiutenti WHERE Utente='$username'";
        $rs = MySqli_query($con, $sql) or die("ADD data fallita");
        $row = MySqli_fetch_row($rs);
        echo "<input id='txtdate2' type='date' class='form-control' name='dose2'  min='$row[0]'>";
        echo "</div>";
    } else {
        echo "<center>";
        echo "<h2><font color=#FC80FF>IL PAZIENTE E' PROTETTO DAL COVID 19</font></h2>";
        echo "</center>";
    }
        ?>




        <div>
            <button type="submit" class="btn btn-primary">Conferma</button>
            <button type="reset" class="btn btn-primary">Svuota campi</button>
        </div>
        </fieldset>
    </form>