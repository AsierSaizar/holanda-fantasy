<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/plantilla/plantilla.css">
<center><button class="tituloakPlantilla PlantillaErakutsi">Plantillako jokalariak:</button></center>
<center><button class="tituloakPlantilla JokokoaErakutsi">Jokoko jokalariak:</button></center>
<?php
if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
    $ezizena = $_SESSION["LogIn"];
    ?>
    <div class="plantillaContainerOsoa">
    <div class="jokokoaContainer">
        <?php
        require_once (APP_DIR . "src/required/functions.php");

        $conn = connection();


        $query = "SELECT *
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
        ?>
        <table class="tabla">


            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?= $row['izenAbizen'] ?>
                    </td>
                    <td>
                        <?= $row['posizioa'] ?>
                    </td>
                    <td>
                        <?= $row['puntuazioa'] ?>
                    </td>
                    <td>
                        <?= $row['taldea'] ?>
                    <td>
                        <?= $row['herrialdea'] ?>
                    </td>
                    <td>
                        <button class="plantilaraEmanBtn">Plantilara eraman</button>
                    </td>
                    </td>
                </tr>


                <?php
            }
            ?>

        </table>


    </div>
    <div class="plantillaContainer">
        <?php

        $conn = connection();

        $query = "SELECT *
            FROM jokalariak
            WHERE id IN (
                SELECT idJokalaria
                FROM erabiltzaileenjokalariak
                WHERE idErabiltzaile IN (
                    SELECT id
                    FROM weberabiltzaileak
                    WHERE ezizena = '$ezizena'
                ) AND egoera='plantilan'
            );";

        $result = $conn->query($query);
        ?>
        <div class="plantillaContainerbarrukoa">

            <?php
            while ($row = $result->fetch_assoc()) {
                ?>

                <div class="jokalariBakoitzaPlantilan <?= $row['posizioa'] ?>">

                    <div>
                        <?= $row['izenAbizen'] ?>
                    </div>

                    <div>
                        <?= $row['posizioa'] ?>
                    </div>

                    <div>
                        <?= $row['puntuazioa'] ?>
                    </div>
                    <div>
                        <?= $row['taldea'] ?>
                    </div>
                    <div>
                        <?= $row['herrialdea'] ?>
                    </div>

                    <div>
                        <button class="jokoraEmanBtn">Jokora eraman</button>
                    </div>

                </div>


                <?php
            }
            ?>
        </div>
    </div>
</div>
    <?php
} else {
    ?>
    <center><h1>Log in to see your plantilini</h1></center>
    <?php
}

?>
