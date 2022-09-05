<?php
session_start();
if (!(isset($_SESSION['consenti']))) { $_SESSION['consenti']=1;
$_SESSION['errorelogin']=0;
$_SESSION['errorerecp']=0;
$_SESSION['errorekey']=0;
$_SESSION['tipo']=null;
$_SESSION['accesso']=0;
$_SESSION['usernameesistente']=0;
}
include ("connessione.php");
connetti_db("vaccini",$con);
$page = isset($_GET["page"]) ? $_GET["page"] : 'homepage.php'; //Se è settato carica la pagina altrimenti carica homepage.
?>
<?php include './template/header.php' ?>
<?php include './pages/' . $page ?>
<?php include './template/footer.php' ?>