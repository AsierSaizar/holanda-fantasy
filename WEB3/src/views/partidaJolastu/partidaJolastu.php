<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/partidaJolastu/partidaJolastu.css">
<?php
if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
    $ezizena = $_SESSION["LogIn"];

    require_once ("../../required/functions.php");

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
    $query = "SELECT AVG(puntuazioa) AS media_puntuacion
        FROM jokalariak
        WHERE id IN (
            SELECT idJokalaria
            FROM erabiltzaileenjokalariak
            WHERE idErabiltzaile IN (
                SELECT id
                FROM weberabiltzaileak
                WHERE ezizena = '$ezizena'
            ) AND egoera='jokoan'
        );";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $puntuazioBatazbestekoa = $row['media_puntuacion'];

    $sessionenSartu = $_SESSION["media"];
    ?>
    <center>
        <div class="diruaJokoan">
            <span>
                <center><b><?= trans("zureDirua") ?>:
                        <?= $erabiltzailearenDirua ?>€</b>
                </center>
            </span>
        </div>
        <div class="puntuazioa diruaJokoan">
            <span>
                <center><b><?= trans("TaldearenMedia") ?>:
                        <?= $puntuazioBatazbestekoa ?></b>
                </center>
            </span>
        </div>
        <input type="hidden" id="taldearenMedia" value="<?= $sessionenSartu ?>">
        <input type="hidden" id="taldearenDirua" value="<?= $erabiltzailearenDirua ?>">
        <div class="container">
            <div class="zailtasunMotak">
                <button id="7582" class="zailtasunak zailtasuna1"><?= trans("difFacil") ?><br>500€</button>
                <button id="8389" class="zailtasunak zailtasuna2"><?= trans("difMedio") ?><br>1000€</button>
                <button id="9098" class="zailtasunak zailtasuna3"><?= trans("difDificil") ?><br>2000€</button>
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
?>
<br><br>
<?php
require_once("../../required/footer.php");
?>