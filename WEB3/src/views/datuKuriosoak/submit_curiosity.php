<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $title = htmlspecialchars($_POST['title']);
    $body = htmlspecialchars($_POST['body']);

    // Ruta al archivo XML
    $file = 'datuak.xml';

    if (file_exists($file)) {
        // Cargar el XML existente
        $xml = simplexml_load_file($file);
        if ($xml === false) {
            echo "Error al cargar el archivo XML.";
            exit;
        }

        // Añadir nuevo elemento 'datoCurioso'
        $newItem = $xml->addChild('datoCurioso');
        $newItem->addChild('titulo', $title);
        $newItem->addChild('cuerpo', $body);
        $newItem->addChild('creador', $name);

        // Guardar los cambios en el archivo XML
        $xml->asXML($file);
        echo "Dato curioso añadido con éxito.";
        
    header('Location: datuKuriosoak.php');
    } else {
        echo "El archivo XML no existe.";
    }
} else {
    header('Location: datuKuriosoak.php');
    echo "Formulario no enviado correctamente.";
}