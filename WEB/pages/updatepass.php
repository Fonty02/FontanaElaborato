<?php
$username = $_SESSION['username'];
$tipo=$_SESSION['tipo'];
if ($tipo == "P") {
    $newpass = md5($_POST['pass']);
    $sql = "UPDATE `utenti` SET `Password` = '$newpass' WHERE `Username`='$username'";
} else {
    $newpass = hash('sha256', $_POST['pass']);
    $sql = "UPDATE `medici` SET `Password` = '$newpass' WHERE `Username`='$username'";
}
$rs = mysqli_query($con, $sql) or die("Query Fallita");
session_destroy();
header ('Location: index.php');
?>
