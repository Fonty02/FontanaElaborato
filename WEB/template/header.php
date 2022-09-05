<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Emergenza Covid-19</title>
    <link rel="icon" href="./images/primula.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">


        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        </button>


        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?page=homepage.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=info.php">Informazioni generali</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=calendar.php">Calendario vaccinazioni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=vaccini.php">Scopri i vaccini</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto:fontanaemanuele14@gmail.com">Contattaci</a>
                </li>
                <?php
                if ($_SESSION['accesso'] == 0) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=login.php">Accedi</a>
                    </li>
                <?php } ?>
                <?php
                if ($_SESSION['accesso'] == 1) { ?>
                    <?php
                    if ($_SESSION['tipo'] == "M") { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=registrapaz.php">Registra un paziente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=lotti.php">Gestisci lotti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=sceglipaz.php">Informazioni sui pazienti</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?page=richiamo.php">Notifica pazienti per richiamo</a>
                        </li>
                    <?php } else { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="?page=certificate.php">Ritira certificato</a>
                        </li>

                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=infoaccount.php">Info account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=logout.php">Logout</a>
                    </li>
                <?php } ?>
            </ul>
            <img src="./images/primula.png" width="2%" align="right">
        </div>
    </nav>
    <div class="container-fluid">