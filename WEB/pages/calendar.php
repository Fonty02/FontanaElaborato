        <center>
            <h2>
                <font color=#CD23CD>CALENDARIO VACCINAZIONI</font>
            </h2>
        </center>
        <p align="center"><img src="./images/Vaccino.jpg" width="50%"></p>
        Il piano vaccinale contro il COVID-19 prevede 4 fasi da attuare entro la fine del 2021. Si partirà dalle categorie più a rischio per arrivare a coprire poi tutta la popolazione
        <ul class="tilesWrap">
            <li>
                <h2>1</h2>
                <h3>FASE 1</h3>
                <p>
                    La prima fase della campagna vaccinale prevede di vaccinare subito le categorie esposte a un rischio altissimo
                </p>
                <button onClick="myFunction1()" id="myBtn1">Più dettagli</button>
            </li>
            <li>
                <h2>2</h2>
                <h3>FASE 2</h3>
                <p>
                    Subito dopo aver terminato la prima fase verranno vaccinate tutte le persone esposte a un rischio medio-alto
                </p>
                <button onClick="myFunction2()" id="myBtn2">Più dettagli</button>
            </li>
            <li>
                <h2>3</h2>
                <h3>FASE 3</h3>
                <p>
                    Con la terza fase si punta a vaccinare tutti le persone che lavorano in luoghi pubblici
                </p>
                <button onClick="myFunction3()" id="myBtn3">Più dettagli</button>
            </li>
            <li>
                <h2>4</h2>
                <h3>FASE 4</h3>
                <p>
                    Con l'ultima fase, infine, si punta a distribuire il vaccino a tutte le persone che non hanno ancora avuto accesso al vaccino
                </p>
                <button onClick="myFunction4()" id="myBtn4">Più dettagli</button>
            </li>
        </ul>
        <span id="dots1"></span> <span id="more1">
            <div>
                <img src="./images/Fase1.jpg" alt="Fase1" width="75%">
            </div><br>
        </span>
        <br>
        <span id="dots2"></span> <span id="more2">
            <div>
                <img src="./images/Fase2.jpg" alt="Fase2"  width="75%">
            </div><br>
        </span>
        <br>
        <span id="dots3"></span> <span id="more3">
            <div>
                <img src="./images/Fase3.jpg" alt="Fase3"  width="75%">
            </div><br>
        </span>
        <br>
        <span id="dots4"></span> <span id="more4">
            <div>
                <img src="./images/Fase4.jpg" alt="Fase4"  width="75%">
            </div><br>
        </span>


<script>
    function myFunction1() {
        var moreText = document.getElementById("more1");
        var btnText = document.getElementById("myBtn1");

        if (dots1.style.display === "none") {
            dots1.style.display = "inline";
            btnText.innerHTML = "Più dettagli";
            moreText.style.display = "none";
        } else {
            dots1.style.display = "none";
            btnText.innerHTML = "Meno dettagli";
            moreText.style.display = "inline";
        }
    }

    function myFunction2() {
        var moreText = document.getElementById("more2");
        var btnText = document.getElementById("myBtn2");

        if (dots2.style.display === "none") {
            dots2.style.display = "inline";
            btnText.innerHTML = "Più dettagli";
            moreText.style.display = "none";
        } else {
            dots2.style.display = "none";
            btnText.innerHTML = "Meno dettagli";
            moreText.style.display = "inline";
        }
    }

    function myFunction3() {
        var moreText = document.getElementById("more3");
        var btnText = document.getElementById("myBtn3");

        if (dots3.style.display === "none") {
            dots3.style.display = "inline";
            btnText.innerHTML = "Più dettagli";
            moreText.style.display = "none";
        } else {
            dots3.style.display = "none";
            btnText.innerHTML = "Meno dettagli";
            moreText.style.display = "inline";
        }
    }

    function myFunction4() {
        var moreText = document.getElementById("more4");
        var btnText = document.getElementById("myBtn4");

        if (dots4.style.display === "none") {
            dots4.style.display = "inline";
            btnText.innerHTML = "Più dettagli";
            moreText.style.display = "none";
        } else {
            dots4.style.display = "none";
            btnText.innerHTML = "Meno dettagli";
            moreText.style.display = "inline";
        }
    }
</script>




<style>
    .cont {
        padding-left: 5%;
        padding-right: 5%;
        padding-bottom: 5%;

    }

    #more1 {
        display: none;
    }

    #more2 {
        display: none;
    }

    #more3 {
        display: none;
    }

    #more4 {
        display: none;
    }


    .tilesWrap {
        padding: 0;
        margin: 50px auto;
        list-style: none;
        text-align: center;
    }

    .tilesWrap li {
        display: inline-block;
        width: 50%;
        min-width: 200px;
        max-width: 250px;
        padding: 20px 20px 20px;
        position: relative;
        vertical-align: top;
        margin: 10px;
        font-family: 'helvetica', san-serif;
        height: 300px;
        background: transparent;
        border: 1px;
        text-align: left;
        
        
    }

    .tilesWrap li h2 {
        font-size: 125px;
        position: absolute;
        opacity: 0.1;
        top: -25px;
        right: 0px;
        transition:  0.3s ease-in-out;
        color: black;
        z-index:-4;
    }

    .tilesWrap li h3 {
        font-size: 20px;
        color: white;
        margin-bottom: 0px;
        z-index:-4;
    }

    .tilesWrap li p {
        font-size: 16px;
        line-height: 18px;
        color: white;
        margin-top: 5px;
        z-index: -4;

    }








    .tilesWrap li button {
        background: transparent;
        border: 1px solid #b7b7b7;
        padding: 10px 20px;
        color: #b7b7b7;
        border-radius: 3px;
        position: absolute;
        transition: all 0.3s ease-in-out;
        transform: translateY(-40px);
        opacity: 0;
        cursor: pointer;
        overflow: hidden;
        z-index: 2; 
    }

    .tilesWrap li button:before {
        content: '';
        position: absolute;
        height: 100%;
        width: 120%;
        background: #00FFF7;
        top: 0;
        opacity: 0;
        left: -140px;
        border-radius: 0 20px 20px 0;
       z-index: -10;
        transition: all 0.3s ease-in-out;

    }

    .tilesWrap li:hover button {
        transform: translateY(5px);
        opacity: 1;
    }

    .tilesWrap li button:hover {
        color: #262a2b;
    }

    .tilesWrap li button:hover:before {
        left: 0;
        opacity: 1;
    }

    .tilesWrap li:hover h2 {
        top: 100px;
        opacity: 0.6;
    }

    .tilesWrap li:before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
       z-index: -10;
        background: #fff;
        transform: skew(2deg, 2deg);
    }

    .tilesWrap li:after {
        content: '';
        position: absolute;
        width: 40%;
        height: 100%;
        left: 0;
        top: 0;
        background: rgba(255, 255, 255, 0.02);
    }

    .tilesWrap li:nth-child(1):before,
    .tilesWrap li:nth-child(2):before,
    .tilesWrap li:nth-child(3):before,
    .tilesWrap li:nth-child(4):before {
        background: #C9FFBF;
        background: -webkit-linear-gradient(to right, #B4A5E8, blue);
        background: linear-gradient(to right, #B4A5E8, blue);
    }
</style>