<?php
include("stampa.php");
$sql = "SELECT Username, CONCAT(Nome, ' ', Cognome) AS Nominativo, DATE_FORMAT(DataN,'%d/%m/%Y') AS DataDiNascita, CF AS `Codice Fiscale`, Stato FROM utenti";
$rs = MySqli_query($con, $sql) or die(MySqli_error($con));
$num = mysqli_num_rows($rs);

if ($num > 0) {

    echo "<form action='?page=enterkey.php' method='POST'>";
    echo " <fieldset><legend>Scelta Paziente</legend>";
    StampaInfoPaz2($rs);
    echo "Scelta rapida tramite ricerca:<br>";
?>

<div class="search-box">
        <input type="text" with=auto placeholder="Inserire il codice fiscale..." name="paz2">
        <div class="result"></div>
    </div>
    </div><br><br><br>
    <div>
        <button type="submit" class="btn btn-primary">Conferma</button>
        <button type="reset" class="btn btn-primary">Svuota campi</button>
    </div>
    </fieldset>
    </form>

<?php
} else {
    echo "<center>";
    echo " <h2>";
    echo "  <font color=#CD23CD>NON CI SONO UTENTI REGISTRATI NELLA PIATTAFORMA</font>";
    echo " </h2>";
    echo "</center>";
} ?>




<script>


$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("pages/backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
<style>
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
