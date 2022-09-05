<?php


function encrypt($key,$plaintext,$username,$con)
{
    
    $sql="UPDATE utenti SET ProblemiSalute=(SELECT AES_ENCRYPT('$plaintext','$key')) WHERE Username='$username'";
    $rs=MySqli_query($con,$sql) or die ("Query fallita2");
}

function decrypt($key,$username,$con)

{
   
    if ($key=="7AB34F5A6D7F112A")
    {
    $sql="SELECT CAST(AES_DECRYPT((SELECT ProblemiSalute FROM utenti WHERE Username='$username'), '$key') AS CHAR) AS Problema FROM utenti WHERE Username='$username'";
    $rs=MySqli_query($con,$sql) or die ("Query fallita3");
    return $rs;
    }
    else return "LA CHIAVE INSERITA NON E' CORRETTA";
}
?>