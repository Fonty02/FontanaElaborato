<?php
$vaccino=$_POST['vaccino'];
$ndosi=$_POST['ndosi'];
$data=$_POST['cal'];
$sql="INSERT INTO lotti (Vaccino, NumeroDosi, DataArrivo) VALUES ('$vaccino', '$ndosi', '$data')";
$rs=MySqli_Query($con,$sql) or die ("Query Fallita");
header ('Location: ?page=lotti.php');
?>