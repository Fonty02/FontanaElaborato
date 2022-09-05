<?php
include("stampa.php");
$sql = "SELECT DATE_ADD(CURRENT_DATE, INTERVAL 1 DAY)";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_row($rs);
echo "
<center>
    <h2>
        <font color=#CD23CD>ECCO L'ELENCO DI CHI SI VACCINERA' DOMANI $row[0]</font>
    </h2>
</center>";
$sql = "CREATE VIEW richiami (`Data della prima vaccinazione`, `Giorni di attesa richiesti per la seconda dose`, `Utente`, `Nominativo`, `Codice Fiscale`) AS (SELECT  Data1 AS 'Sei stato vaccinato il' , Giorni AS 'Giorni richiesti per la seconda dose', utenti.Username, CONCAT(utenti.Cognome,' ',utenti.Nome), utenti.CF FROM vaccini INNER JOIN (lotti INNER JOIN (utenti INNER JOIN lottiutenti ON lottiutenti.Utente=utenti.Username) ON lotti.CodiceLotto=lottiutenti.Lotto1) ON vaccini.CodiceVaccino=lotti.Vaccino)";
$rs = MySqli_query($con, $sql);
$sql = "SELECT COUNT(*) FROM (SELECT DATE_ADD(`Data della prima vaccinazione`,INTERVAL `Giorni di attesa richiesti per la seconda dose` DAY) AS Giorno2, Utente, Nominativo FROM richiami) AS T WHERE T.Giorno2 = (CURRENT_DATE+1)";
$rs = MySqli_query($con, $sql) or die("Query fallita");
$row = mysqli_fetch_row($rs);
if ($row[0] > 0) {
    $sql = "SELECT Utente, Nominativo FROM (SELECT DATE_ADD(`Data della prima vaccinazione`,INTERVAL `Giorni di attesa richiesti per la seconda dose` DAY) AS Giorno2, Utente, Nominativo FROM richiami) AS T WHERE T.Giorno2 = (CURRENT_DATE+1)";
    $rs = MySqli_query($con, $sql) or die("Query fallita");
    echo "<form action='?page=richiamati.php' method='post'>";
    StampaRichiami($rs);
    echo "<br><br>";
    echo "<center><button type='submit' class='btn btn-primary'>Invia notifica richiamo</button></center></form>";
} else echo "<font color=#CD23CD>NON CI SONO UTENTI CHE DOMANI RICEVERANNO LA SECONDA DOSE</font>";

echo "<br><br>
<center><img src='images/Vaccino.jpg' width='50%'><center>";

?>
