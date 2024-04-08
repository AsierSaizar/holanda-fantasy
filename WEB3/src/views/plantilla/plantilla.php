<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/plantilla/plantilla.css">
<center><button class="tituloakPlantilla PlantillaErakutsi">Plantillako jokalariak:</button></center>
<center><button class="tituloakPlantilla JokokoaErakutsi">Jokoko jokalariak:</button></center>
<?php
if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
    $ezizena = $_SESSION["LogIn"];
    ?><center>
    <div class="plantillaContainerOsoa">
        <div class="jokokoaContainer">
            <?php
            require_once (APP_DIR . "src/required/functions.php");

            $conn = connection();

            //JOKALARIEN MEDIA
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

            //JOKALARI KOPURUA
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

            // Verifica si la consulta se ejecutó correctamente
            if ($result) {
                // Obtén el número de filas devueltas por la consulta
                $jokalariKop = $result->num_rows;
            } else {
                // Manejo de error si la consulta falla
                echo "Error al ejecutar la consulta: " . $conn->error;
            }


            ?>

            <br>
            <div class="mediaEtaPartida">
                <h1>Taldearen media:
                    <?= $puntuazioBatazbestekoa ?>
                </h1>
            </div><br>
            <div class="jokalariKop">
                <h1>Jokalari kopurua:
                <?= $jokalariKop ?>/11
                </h1>
            </div><br>
            <input id="jokalariKop" type="hidden" value="<?= $jokalariKop ?>">
            <?php



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
                            <button id="<?= $row['id'] ?>" class="plantilaraEmanBtn">Plantilara eraman</button>
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
                    <center>
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
                                <button id="<?= $row['id'] ?>" class="jokoraEmanBtn">Jokora eraman</button>
                            </div>

                        </div>
                    </center>

                    <?php
                }
                ?>
            </div>
        </div>
    </div></center>
    <?php
} else {
    ?>
    <center>
        <h1>Log in to see your plantilini</h1>
    </center>
    <?php
}

?>