<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/datuKuriosoak/datuKuriosoak.css">

<center>
<h1 id="h1">Fun Facts</h1>
<?php
if (file_exists('datuak.xml')) {
    $xml = simplexml_load_file('datuak.xml');
    foreach ($xml->datoCurioso as $dato) {
        echo "<div class='dato-curioso'>";
        echo "<div class='titulo'>" . htmlspecialchars($dato->titulo) . "</div>";
        echo "<div class='cuerpo'>" . htmlspecialchars($dato->cuerpo) . "</div>";
        echo "<div class='creador'>Created by: " . htmlspecialchars($dato->creador) . "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Error al cargar el archivo XML.</p>";
}
?>
<div class="form-container">
    <h1>Add fun fact</h1>
    <form action="submit_curiosity.php" method="post">
        <label for="name">Name and surname:</label>
        <input type="text" id="name" name="name" required>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="body">Body:</label>
        <textarea id="body" name="body" required></textarea>

        <input type="submit" value="Send fun fact">
    </form>
</div>
<br><br>
</center>
<?php
require_once("../../required/footer.php");
?>