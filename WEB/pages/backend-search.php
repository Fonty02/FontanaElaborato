<?php
$link = mysqli_connect("localhost", "root", "", "vaccini");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_REQUEST["term"])) {

    $sql = "SELECT CONCAT(Nome,' ',Cognome) AS Nominativo, CF, Username FROM utenti WHERE CF LIKE ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $param_term);


        $param_term = $_REQUEST["term"] . '%';


        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);


            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    echo "<p>" . $row["Nominativo"] . "=>" . $row["CF"] ." ->".$row['Username'] ."</p>";
                }
            } else {
                echo "<p>Nessun risultato trovato</p>";
            }
        } else {
            echo "ERRORE: Impossibile eseguire $sql. " . mysqli_error($link);
        }
    }


    mysqli_stmt_close($stmt);
}


mysqli_close($link);
?>