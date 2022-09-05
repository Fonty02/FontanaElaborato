<?php
include("connessione.php");
connetti_db("vaccini", $con);
$foo = file_get_contents('php://input'); //alternativa al POST
$request = json_decode($foo, true);

$username = $request['username'];
$password = md5($request['password']);
$sql = "SELECT COUNT(*)  FROM utenti WHERE Username='$username' AND Password='$password'";
$rs = MySqli_Query($con, $sql) or die("Query fallita");
$row = mysqli_fetch_row($rs);
$nrow = $row[0];
if ($nrow == 0) {
    $response = ["esistente" => 0];
    echo json_encode($response);
    header('Content-type: application/json');
} else {
    $sql = "SELECT * FROM utenti WHERE Username='$username' AND Password='$password'";
    $rs = MySqli_Query($con, $sql) or die("Query fallita");
    $row = mysqli_fetch_assoc($rs);
    $response = [
        "esistente" => 1,
        "Stato"=> $row['Stato']
    ];
    echo json_encode($response);
    header('Content-type: application/json');
}
?>