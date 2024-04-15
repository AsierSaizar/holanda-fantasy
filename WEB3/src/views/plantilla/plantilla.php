<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/plantilla/plantilla.css">

<?php
if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) { 
    ?>
    <center><button class="tituloakPlantilla PlantillaErakutsi">Plantillako jokalariak:</button></center>
    <center><button class="tituloakPlantilla JokokoaErakutsi">Jokoko jokalariak:</button></center><?php
    $ezizena = $_SESSION["LogIn"];

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
    <center>
        <br>
        <div class="mediaEtaPartida taldekoInfoa">
            <h1 class="h1textua"><b>Taldearen media:
                    <?= $puntuazioBatazbestekoa ?></b>
            </h1>
        </div><br>

        <div class="jokalariKop taldekoInfoa">
            <h1 class="h1textua"><b>Jokalari kopurua:
                    <?= $jokalariKop ?>/11</b>
            </h1>
        </div><br>

        <button class="partidaJolastu ">
            <h2 class="h2textua">
                Partida Jolastu
            </h2>

            <input id="taldearenMedia" type="hidden" value="<?= $puntuazioBatazbestekoa ?>">
        </button><br><br>


        <div class="plantillaContainerOsoa">
            <div class="jokokoaContainer">
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
            ) ORDER BY puntuazioa DESC;";

                $result = $conn->query($query);
                ?>

                <div class="jokalariakContainer">
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <div class="jokalariBakoitza">
                            <b>
                            <div class="izenAbizen">
                                <?= htmlspecialchars($row["izen"] . $row["abizen"]) ?>
                            </div>
                            <div class="posizioa">
                                <?= htmlspecialchars($row['posizioa']) ?>
                            </div>
                            <div class="puntuazioa">
                                <?= htmlspecialchars($row['puntuazioa']) ?>
                            </div>
                            <div class="taldea">
                                <?= htmlspecialchars($row['taldea']) ?>
                            </div>
                            <div class="herrialdea">
                                <?= htmlspecialchars($row['herrialdea']) ?>
                            </div>
                            <button id="<?= htmlspecialchars($row['id']) ?>" class="plantilaraEmanBtn">Plantilara
                                eraman</button>
                            </b>
                        </div>
                    <?php endwhile; ?>
                </div>

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
            ) ORDER BY puntuazioa DESC;";

                $result = $conn->query($query);
                ?>
                <div class="plantillaContainerbarrukoa">

                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <center>
                            <div class="jokalariBakoitzaPlantilan <?= $row['posizioa'] ?>">
                                <b>
                                    <div>
                                        <?= $row["izen"] . $row["abizen"] ?>
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
                                </b>
                            </div>
                        </center>

                        <?php
                    }
                    ?>
                </div>
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

?>
<br><br>
<?php
require_once("../../required/footer.php");
?>