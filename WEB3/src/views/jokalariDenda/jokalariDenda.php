<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/jokalariDenda/jokalariDenda.css">

<div class="containerJokalariakMenu">
    <span>
        <center>
            <button class="search-buttonFiltro" id="Jokalariak">
                Jokalariak
            </button>
        </center>

    </span>
    <span>
        <center>
            <button class="search-buttonFiltro" id="Dirua">
                Dirua
            </button>
        </center>

    </span>
</div>

<div class="containerDiruaOsoa">
    <div class="sobreDivClass" id="Sobre1">
        <span>Sobre Normal</span><br><br><br><br>
        <button class="sobreErosiBtn sobreErosiBtn1">Erosi</button>
    </div>
    <div class="sobreDivClass" id="Sobre2">
        <span>Sobre Especial</span><br><br><br><br>
        <button class="sobreErosiBtn sobreErosiBtn2">Erosi</button>
    </div>
    <div class="sobreDivClass" id="Sobre3">
        <span>Sobre Epico</span><br><br><br><br>
        <button class="sobreErosiBtn sobreErosiBtn3">Erosi</button>
    </div>
    <div class="sobreDivClass" id="Sobre4">
        <span>Sobre Leguendario</span><br><br><br><br>
        <button class="sobreErosiBtn sobreErosiBtn4">Erosi</button>
    </div>
</div>



<div class="containerJokalariakOsoa">
    <div class="containerJokalariakMenu">
        <div class="taldeaAukeratzeko probaBack">
            <form action="jokalariDenda.php" method="get">
                <select name="selectTaldea" id="selectTaldea" class="selectTaldea search-input">
                    <option value="Ajax" <?php if (isset ($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Ajax')
                        echo 'selected="selected"'; ?>>Ajax</option>
                    <option value="Fortuna" <?php if (isset ($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Fortuna')
                        echo 'selected="selected"'; ?>>Fortuna</option>
                    <option value="Groningen" <?php if (isset ($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Groningen')
                        echo 'selected="selected"'; ?>>Groningen</option>
                    <option value="Heracles" <?php if (isset ($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Heracles')
                        echo 'selected="selected"'; ?>>Heracles</option>
                    <option value="Utrecht" <?php if (isset ($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Utrecht')
                        echo 'selected="selected"'; ?>>Utrecht</option>
                </select>
                <input class="search-buttonFiltro" type="submit" value="<?= trans("Bilatu") ?>" />
            </form>
        </div>

        <?php

        if (isset ($_SESSION['LogIn']) && $_SESSION['LogIn'] != "") {
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

        <div class="diruaAgertzeko probaBack1">
            <span>Zure dirua:
                <?= $erabiltzailearenDirua ?>€
            </span>
        </div>
    </div>

    <div class="containerJokalariak">
        <?php
        require_once (APP_DIR . "/src/required/functions.php");
        $conn = connection();
        $AutatutakoTaldea = (isset ($_GET["selectTaldea"])) ? $_GET["selectTaldea"] : "Ajax";
        $query = "SELECT * FROM erronka3.jokalariak WHERE taldea='$AutatutakoTaldea';";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="jokalariBakoitza">
                    <b>
                        <div class="izenAbizenClass">
                            <?= $row["izenAbizen"] ?>
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


                    <button id="saskiraGehitu<?= $row["id"] ?>" class="saskiaBotoia addToSaskia">
                        Fitxatu jokalaria
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