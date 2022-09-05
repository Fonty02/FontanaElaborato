<?php
include ("codicefiscale.php");
include ("aes.php");
include ("qrcode.php");
	$email=$_POST['Email'];
	$phone=$_POST['Telefono'];
	$datanascita=$_POST['cal'];
	$sesso=$_POST['sesso'];
	$comune=$_POST['comune'];
    $nome=$_POST['Nome'];
	$cognome=$_POST['Cognome'];
    $datavac=$_POST['dose1'];
    $lotto=$_POST['lotto'];
	$data=explode('-',$datanascita);
	$DA=$data[0];
	$DM=$data[1];
	$DG=$data[2];
	$username=calcola("vaccini",$con,$cognome,$nome,$DG,$DM,$DA,$sesso,$comune);
    $caratteri = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pass = '';
    for ($i = 0; $i < 8; $i++) {
        $pass .= $caratteri[rand(0, strlen($caratteri) - 1)];
    }
    $password=md5($pass);
    $stato=0;
    $sql="SELECT vaccini.Nome FROM vaccini INNER JOIN lotti ON lotti.Vaccino=vaccini.CodiceVaccino AND lotti.CodiceLotto='$lotto'";
    $rs=MySqli_query($con,$sql) or die ("QEURY FALLITA");
    $row=MySqli_fetch_row($rs);
    $nomevaccino=$row[0];
    if ($nomevaccino=="Johnson&Johnson")
    {
         $stato=1;
    }
    $sql="INSERT INTO `utenti` (`Username`, `Password`, `Nome`, `Cognome`, `DataN`, `Telefono`, `Email`, `Sesso`, `Comune`, `Stato`, `CF`)";
		$sql.="VALUES ('$username', '$password', '$nome', '$cognome', '$datanascita', '$phone', '$email', '$sesso', '$comune', '$stato', '$username')";

		$rs=mysqli_query($con,$sql) or die("Query fallita Inserimento");
        $_SESSION['emailpaz']=$email;
        $_SESSION['usernamepaz']=$username;
        $_SESSION['passwordpaz']=$pass;
        $key="7AB34F5A6D7F112A";
        if (strlen($_POST['patologie'])!=0)
        {
            encrypt($key,$_POST['patologie'],$username,$con);
        }
        else encrypt($key,"Nessuna patologia segnalata",$username,$con);
       


        
$sql="LOCK TABLE lotti WRITE";
$rs=MySqli_query($con,$sql) OR DIE ("Query di lock fallita");
$sql="INSERT INTO lottiutenti (Utente, Lotto1, Data1) VALUES ('$username', '$lotto', '$datavac')";
$rs=MySqli_query($con,$sql);
$sql="UPDATE lotti SET NumeroDosi=(NumeroDosi-1) WHERE CodiceLotto='$lotto'";
$rs=MySqli_query($con,$sql) OR DIE ("Query lotti meno fallita");
$sql="UNLOCK TABLES";
$rs=MySqli_query($con,$sql) OR DIE ("Query di unlock fallita");


if ($nomevaccino=="Johnson&Johnson")
{
    $qc = new QrCode();
    $gen=null;
     if ($sesso=="Maschile") 
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
     $text=$gen[0]." signor".$gen[1]." ".$cognome." ".$nome." è stato vaccinato contro il SarsCOV-2 con vaccino Johnson&Johnson il giorno ".$datavac;
     $qc->TEXT($text);
// Save QR Code
$qc->QRCODE(400,$username.".png");
$oldFile = "./".$username.".png";
$newFile = "./certificati/".$username.".png";
if (false === rename($oldFile, $newFile)) {
    printf('Impossibile rinominare il file %s', $oldPath);
}
$pdfpath="./".$qc->QRCODEPDF($newFile);

$sql="INSERT INTO certificati (Username, `pathPDF`) VALUES ('$username', '$pdfpath')";
$rs=MySqli_query($con,$sql) or die ("Query fallita");
header ("Location: pages/emailProtetto.php?s=$sesso&email=$email&confR=1&at=$pdfpath");
}
else header("Location: ?page=confReg.php");
?>