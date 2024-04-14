<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/partidaJolastu/partidaJolastu.css">
<?php
if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
        $ezizena = $_SESSION["LogIn"];
    
        require_once ("../../required/functions.php");
        //require_once(HREF_SRC_DIR. "/required/functions.php");
    
        $conn = connection();
    
        $sql = "SELECT * FROM weberabiltzaileak where ezizena = '$ezizena'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $erabiltzailearenDirua = $row["dirua"];
            }
        } else {
            echo "ez dago ezizen horrekin usuariorik.";
        }
    
    
    $sessionenSartu = $_SESSION["media"];
    ?>
    <center>
        <div class="diruaJokoan">
            <span>
                <center><b>Zure dirua:
                    <?= $erabiltzailearenDirua ?>€</b>
                </center>
            </span>
        </div>
        <input type="hidden" id="taldearenMedia" value="<?= $sessionenSartu ?>">
        <input type="hidden" id="taldearenDirua" value="<?= $erabiltzailearenDirua ?>">
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
        <h1 class="h1"><br><br><br><br><br><br>Log in to play</h1>
    </center>
    <?php
}