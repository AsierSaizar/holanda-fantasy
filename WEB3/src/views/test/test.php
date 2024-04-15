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
  <form id="test-form" action="" method="post">
    <?php
    if ($result->num_rows > 0) {
      // Variable para almacenar el número de pregunta actual
      $current_question_number = 1;
      // Mostrar cada pregunta y respuestas
      while ($row = $result->fetch_assoc()) {
        ?>
        <div class="question-container">
          <p><?= $row["galdera"] ?></p>
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
                <input type="checkbox" class="answer-checkbox" name="answer[]" value="<?= $lehenErantzuna ?>" data-group="<?= $checkbox_group ?>" data-correct-answer="<?= $correct_answer ?>">
                <?= $lehenErantzuna ?>
              </label>
            </li>
            <li>
              <label>
                <input type="checkbox" class="answer-checkbox" name="answer[]" value="<?= $bigarrenErantzuna ?>" data-group="<?= $checkbox_group ?>" data-correct-answer="<?= $correct_answer ?>">
                <?= $bigarrenErantzuna ?>
              </label>
            </li>
            <li>
              <label>
                <input type="checkbox" class="answer-checkbox" name="answer[]" value="<?= $hirugarrenErantzuna ?>" data-group="<?= $checkbox_group ?>" data-correct-answer="<?= $correct_answer ?>">
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
    <center><input type="submit" value="Bidali formularioa"></center>
  </form>

  <script>
    $(document).ready(function() {
      $('.answer-checkbox').click(function() {
        var group = $(this).data('group');
        var correctAnswer = $(this).data('correct-answer');
        if ($(this).prop('checked')) {
          $('.answer-checkbox[data-group="' + group + '"]').not(this).prop('disabled', true);
        } else {
          $('.answer-checkbox[data-group="' + group + '"]').prop('disabled', false);
        }
        // Comprobar si la respuesta seleccionada es correcta
        if ($(this).val() === correctAnswer && $(this).prop('checked')) {
          $('.answer-checkbox[data-group="' + group + '"]').not(this).prop('checked', false);
        }
      });

      $('#test-form').submit(function(e) {
        var correctCount = 0;
        $('.answers').each(function() {
          var $checkedCheckbox = $(this).find('.answer-checkbox:checked');
          if ($checkedCheckbox.length > 0) {
            var selectedAnswer = $checkedCheckbox.val();
            var correctAnswer = $checkedCheckbox.data('correct-answer');
            if (selectedAnswer === correctAnswer) {
              correctCount++;
            }
          }
        });
        alert("Erantzun zuzenak " + correctCount);
        if (correctCount == 1) {
          alert("100€ irabazi dituzu")
        } else if (correctCount == 2) {
          alert("200€ irabazi dituzu")
        } else if (correctCount == 3) {
          alert("300€ irabazi dituzu")
        }
      
   
      });
    });
    // Calcular el dinero ganado
    var dineroGanado;
      if (correctCount == 1) {
        dineroGanado = 100;
      } else if (correctCount == 2) {
        dineroGanado = 200;
      } else if (correctCount == 3) {
        dineroGanado = 300;
      } else {
        dineroGanado = 0; // No hay respuestas correctas, por lo tanto, no hay dinero ganado
      }

      // Realizar la solicitud AJAX para enviar el dinero ganado al servidor
      $.ajax({
        url: 'diruaGehitu.php', // URL del archivo PHP que maneja la actualización de la base de datos
        method: 'POST',
        data: {
          dineroGanado: dineroGanado // Enviar la cantidad de dinero ganada al servidor
        },
        success: function(response) {
          // Manejar la respuesta del servidor si es necesario
          alert('Dinero ganado actualizado en la base de datos:', response);
          // Recargar la página después de enviar el formulario
          location.reload();
        },
        error: function(xhr, status, error) {
          // Manejar errores si ocurre alguno durante la solicitud AJAX
          console.error('Error al actualizar el dinero ganado en la base de datos:', error);
        }
      });
  </script>
</body>

</html>