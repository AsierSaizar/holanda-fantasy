<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/partidaJolastu/partidaJolastu.css">
<?php
if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
    
    $sessionenSartu=$_SESSION["media"];
    ?>
    <center>
        <input type="hidden" id="taldearenMedia" value="<?= $sessionenSartu ?>">
        <div class="container">
            <div class="zailtasunMotak">
                <button id="7582" class="zailtasunak zailtasuna1">Dificultad Facil<br>500€</button>
                <button id="8389" class="zailtasunak zailtasuna2">Dificultad Media<br>1000€</button>
                <button id="9098" class="zailtasunak zailtasuna3">Dificultad Dificil<br>2000€</button>
            </div>
        </div>
    </center>



    <?php
} else {
    ?>
    <center>
        <h1>Log in to see your plantilini</h1>
    </center>
    <?php
}