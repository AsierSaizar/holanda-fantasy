<?php

require_once("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/jokalariDenda/jokalariDenda.css">


<div class="containerJokalariakMenu">
    <div class="taldeaAukeratzeko probaBack">
    <form action="jokalariDenda.php" method="get">
            <select name="selectTaldea" id="selectTaldea" class="selectTaldea search-input">
            <option value="Ajax" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Ajax') echo 'selected="selected"'; ?>>Ajax</option>
            <option value="Fortuna" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Fortuna') echo 'selected="selected"'; ?>>Fortuna</option>
            <option value="Groningen" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Groningen') echo 'selected="selected"'; ?>>Groningen</option>
            <option value="Heracles" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Heracles') echo 'selected="selected"'; ?>>Heracles</option>
            <option value="Utrecht" <?php if (isset($_GET['selectTaldea']) && $_GET['selectTaldea'] === 'Utrecht') echo 'selected="selected"'; ?>>Utrecht</option>
            </select>
            <input class="search-buttonFiltro" type="submit" value="<?= trans("Bilatu") ?>" />
        </form>  
    </div>
    
    <div class="jokalarienLekua probaBack" >
        <h2><b>Jokalariak:</b></h2>    
    </div>

    <div class="diruaAgertzeko probaBack">
        
    </div>
</div>

<div class="containerJokalariak">
    <?php
    require_once (APP_DIR . "/src/required/functions.php");
    $conn = connection();
    $AutatutakoTaldea = (isset($_GET["selectTaldea"])) ? $_GET["selectTaldea"] : "Ajax";
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
                        <?=$row["posizioa"] ?>
                    </div>
                    <div class="puntuazioaClass">
                        <?= $row["puntuazioa"] ?>/100🌟
                    </div>
                    <div class="prezioClass">
                        <?= $row["prezioa"] ?>€
                    </div>
                </b>
    
    
                <button id="saskiraGehitu" class="saskiaBotoia addToSaskia">
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

