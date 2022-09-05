<?php
$username = $_POST['username'];
$password = $_POST['password'];
if (isset($_POST['tipo'])) $tipo = "M";
else $tipo = "P";

$sql = null;
if ($tipo == "M") {

    $passcodeen = hash('sha256', $password);
    $sql = "SELECT COUNT(*)  FROM medici WHERE Username='$username' AND Password='$passcodeen'";
} else {
    $passcodeen = md5($password);
    $sql = "SELECT COUNT(*)  FROM utenti WHERE Username='$username' AND Password='$passcodeen'";
}
$rs = MySqli_Query($con, $sql) or die ("Query fallita");
$row = mysqli_fetch_row($rs);
$nrow=$row[0];
if ($nrow == 0) {
    $_SESSION['errorelogin'] = 1;
    header('Location: ?page=login.php');
} else {
    $_SESSION['tipo'] = $tipo;
    $_SESSION['errorelogin'] = 0;
    $_SESSION['Username'] = $username;
    $_SESSION['accesso'] = 1;
    header('Location: ?page=homepage.php');
}
?>