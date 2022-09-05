<center>
    <h2>
        <font color=#CD23CD>Ecco a te l'elenco dei vaccini attualmente disponibili e tutto le informazioni</font>
    </h2>
</center>
<?php
$sql="SELECT * from vaccini";
$rs=MySqli_Query($con,$sql);
echo mysqli_error($con);
while ($row=MySqli_fetch_row($rs))
{
    echo "<center><h3><font color='#CD23C1'>".$row[1]."</font></h3></center><br>";
    echo "TIPOLOGIA: ".$row[2]."<br>";
    echo "NUMERO DI DOSI: ".$row[3]."<br>";
    echo "<p align='justify'>".$row[4]."<p><br>";
}
?>