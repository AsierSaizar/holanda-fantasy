<?php

require_once ("../../required/head.php");

?>
<?php
require_once ("../../required/functions.php");

$conn = connection();
// Consulta SQL para obtener preguntas y respuestas

$sql = "SELECT * FROM testgalderak ORDER BY RAND() LIMIT 3";
$result = $conn->query($sql);

// Cerrar conexión

?>
<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/test/test.css">

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galderak</title>
  <link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/test/test.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <center>
    <br>
    <?php

    if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
      
      $aukeraLanguage = $_SESSION["_LANGUAGE"];
      if ($result->num_rows > 0) {
        // Variable para almacenar el número de pregunta actual
        $current_question_number = 1;
        // Mostrar cada pregunta y respuestas
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="question-container">
            <p><?= $row["galdera_$aukeraLanguage"] ?></p>
            <ul class="answers">
              <?php
              // Asignar el número de pregunta actual al conjunto de checkboxes
              $checkbox_group = 'checkbox_group_' . $current_question_number;
              $correct_answer = $row["erantzunaZuzena"];
              $zenb = rand(1, 6);
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
              <li>
                <label>
                  <input type="checkbox" class="answer-checkbox" name="answer[]" value="<?= $lehenErantzuna ?>"
                    data-group="<?= $checkbox_group ?>" data-correct-answer="<?= $correct_answer ?>">
                  <?= $lehenErantzuna ?>
                </label>
              </li>
              <li>
                <label>
                  <input type="checkbox" class="answer-checkbox" name="answer[]" value="<?= $bigarrenErantzuna ?>"
                    data-group="<?= $checkbox_group ?>" data-correct-answer="<?= $correct_answer ?>">
                  <?= $bigarrenErantzuna ?>
                </label>
              </li>
              <li>
                <label>
                  <input type="checkbox" class="answer-checkbox" name="answer[]" value="<?= $hirugarrenErantzuna ?>"
                    data-group="<?= $checkbox_group ?>" data-correct-answer="<?= $correct_answer ?>">
                  <?= $hirugarrenErantzuna ?>
                </label>
              </li>
            </ul>
          </div>
          <?php
          // Incrementar el número de pregunta actual para la siguiente iteración
          $current_question_number++;
        }
      }
      ?>
    </center>
    <center>
      <button class="testBidali" type="submit"><?= trans("bidali") ?>
    </center><?php
    } else {
      ?>
    <center>
      <h1><?= trans("LogeatuHauIkusteko") ?></h1>
    </center>
    <?php
    }
    ?>
  <br><br>



<?php
require_once("../../required/footer.php");
?>