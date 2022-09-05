<?php
include("stampa.php");
?>
<center>
    <h2>
        <font color=#CD23CD>GESTIONE DEI LOTTI </font>
    </h2>
</center><br>

<ul>
<li><a href="#Aggiungi">AGGIUNGI UN LOTTO</a></li>
<li><a href="#Visualizza">VISUALIZZA LOTTI</a></li>
</ul>

<p>
<a name="Aggiungi">
<h3>
    <font color=#CD23CD>AGGIUNGI UN LOTTO</font>
</h3>
<form action="?page=aggiungilotto.php" method="POST">
    <fieldset>
        <div class="form-group">
            <label for="Vaccino">Vaccino</label>
            <select class="form-control" id="Vaccino"  name="vaccino" required>
            <?php
            $sql="SELECT CodiceVaccino,Nome FROM vaccini";
            $rs=MySqli_query($con,$sql) or die ("Query fallita");
            while ($row=MySqli_fetch_row($rs))
            {
                echo "<option value='$row[0]'>".$row[1]."</option>";
            }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="NumeroDosi">NumeroDosi</label>
            <input type="number" class="form-control" id="NumeroDosi" placeholder="Numero delle dosi disponibili" name="ndosi" required>
        </div>
        <div class="form-group">
            <label for="DataArrivo">Data di arrivo</label>
            <input id="txtdate" type="date" class="form-control" name="cal" min="1900-01-01" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Conferma</button>
            <button type="reset" class="btn btn-primary">Svuota campi</button>
        </div>
    </fieldset>
</form><br>
</p><br>

<p>
<a name="Visualizza">
<h3>
    <font color=#CD23CD>VISUALIZZA LOTTI</font>
</h3>
<?php
$sql="SELECT COUNT(*) FROM lotti WHERE `NumeroDosi`>0";
$rs=MySqli_query($con,$sql) or die ("Query fallita");
$row=MySqli_fetch_row($rs);
if ($row[0]==0)
{
    echo "<font color='red'>NON CI SONO LOTTI DISPONIBILI AL MOMENTO</font>";
}
else
{
$sql="SELECT lotti.CodiceLotto,lotti.Vaccino AS `Codice Vaccino`,vaccini.Nome AS `Nome Vaccino`, lotti.NumeroDosi,lotti.DataArrivo FROM lotti INNER JOIN vaccini ON vaccini.CodiceVaccino=lotti.Vaccino  WHERE lotti.NumeroDosi>0";
$rs=MySqli_Query($con,$sql);
StampaLotti($rs);
}
?>
</p><br>


<script language="javascript">
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("txtdate").setAttribute("max", today);
</script>