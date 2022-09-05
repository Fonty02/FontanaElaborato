<?php
include ("stampa.php");
include("pdf/fpdf.php");
$sql="SELECT stato FROM utenti where Username='".$_SESSION['Username']."'";
$rs=MySqli_query($con,$sql) or die ("Query fallita");
$row=MySqli_fetch_row($rs);
if ($row[0]==0){ echo "<center>
<h2>
    <font color=red>Siamo spiacenti, non hai ancora ottenuto un certificato di immunità dal Sars-Cov-2 (COVID19)</font><br>
    <img src='./images/sorry.jpg' align='center' width='25%'><br>
</h2>
</center>";
$sql = "CREATE VIEW vistaTemp (`Data della prima vaccinazione`, `Giorni di attesa richiesti per la seconda dose`) AS (SELECT  Data1 AS 'Sei stato vaccinato il' , Giorni AS 'Giorni richiesti per la seconda dose' FROM vaccini INNER JOIN (lotti INNER JOIN (utenti INNER JOIN lottiutenti ON lottiutenti.Utente=utenti.Username AND utenti.Username='".$_SESSION['Username']."') ON lotti.CodiceLotto=lottiutenti.Lotto1) ON vaccini.CodiceVaccino=lotti.Vaccino)";
$rs=MySqli_query($con,$sql);
$sql="SELECT * FROM vistaTemp";
$rs=MySqli_query($con,$sql);
StampaLotti($rs);
$sql="SELECT * FROM vistaTemp";
$rs=MySqli_query($con,$sql);
$row=mysqli_fetch_row($rs);
$sql="SELECT DATE_ADD('$row[0]',INTERVAL $row[1] DAY)";
$rs=MySqli_query($con,$sql) or die ("Query fallita");
$row=MySqli_fetch_row($rs);
echo "<br><center><h2><font color=red>Per la seconda dose devi attendere almeno il ".$row[0]."</font></h2></center>";
$sql="DROP VIEW vistaTemp";
$rs=MySqli_query($con,$sql);
}else {echo"
<center>
    <h2>
        <font color=#CD23CD>ECCO A TE IL TUO CERTIFICATO</font>
    </h2>";
$sql="SELECT pathPDF FROM certificati WHERE certificati.Username='".$_SESSION['Username']."'";
$rs=MySqli_query($con,$sql) or die ("Query fallita");
$row=MySqli_fetch_row($rs);
$source="$row[0]";
echo "<embed src='$source' width='50%' height='700px'><br>";
echo "<a href=pages/download.php?path=.".$row[0].">Scarica come pdf</a><br>";
}
?>
