<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/jokalariDenda/jokalariDenda.css">
<?php

if (isset($_SESSION['LogIn']) && $_SESSION['LogIn'] != "") {
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

} else {
    $erabiltzailearenDirua = "0";
}

?>
<div class="containerJokalariakMenu">
    <span>
        <center>
            <button class="search-buttonFiltro" id="Jokalariak">
            <?= trans("jokalariak") ?>
            </button>
        </center>

    </span>
    <span>
        <center>
            <button class="search-buttonFiltro" id="Dirua">
            <?= trans("sobreak") ?>
            </button>
        </center>

    </span>
</div>
<div class="diruaAgertzeko diruaAgertzeko2 probaBack1">
    <span>
        <center><?= trans("zureDirua") ?>:
            <?= $erabiltzailearenDirua ?>€
        </center>
    </span>
</div>
<div class="containerDiruaOsoa">

    <div class="sobreDivClass" id="Sobre1">
        <span><?= trans("sobreNormal") ?></span><br><br><br><br>
        <button class="sobreErosiBtn" id="sobreErosiBtn1"><?= trans("erosi") ?></button><br>
        <span>500€</span>
    </div>
    <div class="sobreDivClass" id="Sobre2">
        <span><?= trans("sobreEspecial") ?></span><br><br><br><br>
        <button class="sobreErosiBtn" id="sobreErosiBtn2"><?= trans("erosi") ?></button><br>
        <span>1000€</span>
    </div>
    <div class="sobreDivClass" id="Sobre3">
        <span><?= trans("sobreEpico") ?></span><br><br><br><br>
        <button class="sobreErosiBtn" id="sobreErosiBtn3"><?= trans("erosi") ?></button><br>
        <span>2000€</span>
    </div>
    <div class="sobreDivClass" id="Sobre4">
        <span><?= trans("sobreLeguendario") ?></span><br><br><br><br>
        <button class="sobreErosiBtn" id="sobreErosiBtn4"><?= trans("erosi") ?></button><br>
        <span>4000€</span>
    </div>
</div>



<div class="containerJokalariakOsoa">
    <div class="containerJokalariakMenu">
        <div class="taldeaAukeratzeko probaBack">
            <form action="jokalariDenda.php" method="get">
                <select name="selectTaldea" id="selectTaldea" class="selectTaldea search-input">
                    <option value="Ajax" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Ajax')
                        echo 'selected="selected"'; ?>>Ajax</option>
                    <option value="Fortuna" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Fortuna')
                        echo 'selected="selected"'; ?>>Fortuna</option>
                    <option value="Groningen" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Groningen')
                        echo 'selected="selected"'; ?>>Groningen</option>
                    <option value="Heracles" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Heracles')
                        echo 'selected="selected"'; ?>>Heracles</option>
                    <option value="Utrecht" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Utrecht')
                        echo 'selected="selected"'; ?>>Utrecht</option>
                </select>
                <input class="search-buttonFiltro" type="submit" value="<?= trans("Bilatu") ?>" />
            </form>
        </div>



        <div class="diruaAgertzeko probaBack1">
            <span><?= trans("zureDirua") ?>:
                <?= $erabiltzailearenDirua ?>€
            </span>
        </div>
    </div>

    <div class="containerJokalariak">
        <?php
        require_once (APP_DIR . "/src/required/functions.php");
        $conn = connection();
        $AutatutakoTaldea = (isset($_GET["selectTaldea"])) ? $_GET["selectTaldea"] : "Ajax";
        $query = "SELECT * FROM erronka3.jokalariak WHERE taldea='$AutatutakoTaldea' ORDER BY puntuazioa DESC;";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="jokalariBakoitza">
                    <b>
                        <div class="izenAbizenClass">
                            <?= $row["izen"].$row["abizen"] ?>
                        </div>
                        <div class="posizioaClass">
                            <?= $row["posizioa"] ?>
                        </div>
                        <div class="puntuazioaClass">
                            <?= $row["puntuazioa"] ?>/100🌟
                        </div>
                        <div class="prezioClass">
                            <?= $row["prezioa"] ?>€
                        </div>
                    </b>

                    <button id="erosiJokalaria<?= $row["id"] ?>" class="erosiJokalaria">
                    <?= trans("erosi jokalaria") ?>
                    </button>


                </div>
                <?php
            }

        } else {
            echo trans("Ez dago irizpide hauek betetzen dituet produkturik.");
        }


        $conn->close();

        ?>
    </div>
</div>
<br><br>
<?php
require_once("../../required/footer.php");
?>