<?php
include ("aes.php");
include ("qrcode.php");
$_SESSION['errorekey'] = 0;
$username=$_SESSION['paz'];
$key=$_SESSION['key'];
 if (strlen($_POST['patologie'])!=0)
 {
     encrypt($key,$_POST['patologie'],$username,$con);
 }
 else encrypt($key,"Nessuna patologia segnalata",$username,$con);

 if (isset($_POST['lotto']) && ($_POST['dose2']!=null))
 {
    $lotto=$_POST['lotto'];
    $stato=1;
    $datavac=$_POST['dose2'];
    $sql="UPDATE utenti SET Stato='$stato' WHERE Username='$username'";
    $rs=MySqli_query($con,$sql) OR DIE ("Update fallito");
    $sql="LOCK TABLE lotti WRITE";
$rs=MySqli_query($con,$sql) OR DIE ("Query di lock fallita");
$sql="UPDATE lottiutenti SET Lotto2='$lotto', Data2='$datavac' WHERE Utente='$username'";
$rs=MySqli_query($con,$sql);
$sql="UPDATE lotti SET NumeroDosi=(NumeroDosi-1) WHERE CodiceLotto='$lotto'";
$rs=MySqli_query($con,$sql) OR DIE ("Query lotti meno fallita");
$sql="UNLOCK TABLES";
$rs=MySqli_query($con,$sql) OR DIE ("Query di unlock fallita");



$sql="SELECT utenti.Nome, utenti.Cognome, lottiutenti.Data1, lottiutenti.Data2, utenti.Sesso, vaccini.Nome FROM vaccini INNER JOIN (lotti INNER JOIN (utenti INNER JOIN lottiutenti ON lottiutenti.Utente=utenti.Username AND utenti.Username='$username') ON lotti.CodiceLotto=lottiutenti.Lotto1) ON vaccini.CodiceVaccino=lotti.Vaccino";
$rs=MySqli_query($con,$sql) or die ("Selezione date fallita");
$row=MySqli_fetch_row($rs);
$qc = new QrCode();
$gen=null;
 if ($row[4]=="Maschile") 
 {
     $gen[0]="Il";
     $gen[1]="e";
     $gen[2]="o";
 }
 else
 {
    $gen[0]="La";
    $gen[1]="a";
    $gen[2]="a";
 }
 $text=$gen[0]." signor".$gen[1]." ".$row[1]." ".$row[0]." è stato vaccinato contro il SarsCOV-2 con vaccino ".$row[5]." il giorno ".$row[2]." (prima dose) e il giorno ".$row[3]." (seconda dose)";
 $qc->TEXT($text);
// Save QR Code
$sql="SELECT CF,Sesso,Email FROM utenti WHERE Username='$username'";
$rs=MySqli_query($con,$sql) or die ("Generazione CF fallita");
$row=MySqli_fetch_row($rs);
$cf=$row[0];
$sesso=$row[1];
$email=$row[2];
$qc->QRCODE(400,$cf.".png");
$oldFile = "./".$cf.".png";
$newFile = "./certificati/".$cf.".png";

if (false === rename($oldFile, $newFile)) {
printf('Impossibile rinominare il file %s', $oldPath);
}
$pdfpath="./".$qc->QRCODEPDF($newFile);
$sql="INSERT INTO certificati (Username, `pathPDF`) VALUES ('$username', '$pdfpath')";
$rs=MySqli_query($con,$sql) or die ("Query fallita");
unset($_SESSION['key']);
header ("Location: pages/emailProtetto.php?s=$sesso&email=$email&confR=0&at=$pdfpath");
 }
 else{
    unset($_SESSION['key']);
 header("Location: ?page=sceglipaz.php"); 
 }
