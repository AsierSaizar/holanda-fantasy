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
    while ($row = $result->fetch_assoc()) { ?>
      <div>
        <p><?= $row["galdera"] ?></p>
        <ul>
          <li><?= $row["erantzuna1"] ?></li>    
          <input type="checkbox"></input>
          <li><?= $row["erantzuna2"] ?></li>
          <input type="checkbox"></input>
          <li><?= $row["erantzunaZuzena"] ?></li>
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