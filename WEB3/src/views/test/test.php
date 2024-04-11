<?php

require_once ("../../required/head.php");

?>
<?php
require_once ("../../required/functions.php");

$conn = connection();
// Consulta SQL para obtener preguntas y respuestas

$sql = "SELECT galdera, erantzuna1, erantzuna2, erantzunaZuzena FROM testgalderak ORDER BY RAND() LIMIT 3";
$result = $conn->query($sql);

// Cerrar conexión
$conn->close();
?>
<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/test/test.css">

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <center>
    <title> Galderak </title>
  </center>
</head>

<body>
  <form action="" method="post">
    <?php
    if ($result->num_rows > 0) {
      // Mostrar cada pregunta y respuestas
      while ($row = $result->fetch_assoc()) {
        ?>
        <div>
          <p><?= $row["galdera"] ?></p>
          <ul>
            
            <?php
        
              $zenb = rand(1, 9);
            switch ($zenb) {

              case 1:
                $lehenErantzuna = $row["erantzuna1"];
                $bigarrenErantzuna = $row["erantzuna2"];
                $hirugarrenErantzuna = $row["erantzunaZuzena"];
                break;
              case 2:
                $lehenErantzuna = $row["erantzunaZuzena"];
                $bigarrenErantzuna = $row["erantzuna1"];
                $hirugarrenErantzuna = $row["erantzuna2"];
                break;
              case 3:
                $lehenErantzuna = $row["erantzuna2"];
                $bigarrenErantzuna = $row["erantzunaZuzena"];
                $hirugarrenErantzuna = $row["erantzuna1"];
                break;
              case 4:
                $lehenErantzuna = $row["erantzuna2"];
                $bigarrenErantzuna = $row["erantzuna1"];
                $hirugarrenErantzuna = $row["erantzunaZuzena"];
                break;
              case 5:
                $lehenErantzuna = $row["erantzuna1"];
                $bigarrenErantzuna = $row["erantzunaZuzena"];
                $hirugarrenErantzuna = $row["erantzuna2"];
                break;
              case 6:
                $lehenErantzuna = $row["erantzunaZuzena"];
                $bigarrenErantzuna = $row["erantzuna2"];
                $hirugarrenErantzuna = $row["erantzuna1"];
                break;
            }
            ?>
            <li><?= $lehenErantzuna ?></li>
            <input type="checkbox"></input>
            <li><?= $bigarrenErantzuna ?></li>
            <input type="checkbox"></input>
            <li><?= $hirugarrenErantzuna ?></li>
            <input type="checkbox"></input>
          </ul>
        </div>
        <?php
      }
    }
    ?>
    <center><input type="submit" value="Bidali formularioa"></input></center>
  </form>
</body>

</html>