<?php

require_once ("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/datuKuriosoak/datuKuriosoak.css">

<center><br>
<h1 id="h1"><?= trans("FunFacts") ?></h1>
<?php
if (file_exists('datuak.xml')) {
    $xml = simplexml_load_file('datuak.xml');
    foreach ($xml->datoCurioso as $dato) {
        echo "<div class='dato-curioso'>";
        echo "<div class='titulo'>" . htmlspecialchars($dato->titulo) . "</div>";
        echo "<div class='cuerpo'>" . htmlspecialchars($dato->cuerpo) . "</div>";
        echo "<div class='creador'>".trans("createdBY")." : " . htmlspecialchars($dato->creador) . "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Error al cargar el archivo XML.</p>";
}
?>
<div class="form-container">
    <h1><?= trans("funFactAdd") ?></h1>
    <form action="submit_curiosity.php" method="post">
        <label for="name"><?= trans("izenaAbizena") ?>:</label>
        <input class="inputText" type="text" id="name" name="name" required>

        <label for="title"><?= trans("titulo") ?>:</label>
        <input class="inputText" type="text" id="title" name="title" required>

        <label for="body"><?= trans("body") ?>:</label>
        <textarea class="textarea" id="body" name="body" required></textarea>

        <input class="inputText" type="submit" value="<?= trans("sendFunFact") ?>">
    </form>
</div>
<br><br>
</center>
<?php
require_once("../../required/footer.php");
?>