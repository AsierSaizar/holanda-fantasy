<?php
require_once("../../required/functions.php");

// Iniciar la sesión
session_start();

if (isset($_SESSION['LogIn']) && $_SESSION['LogIn'] != "") {

    $conn = connection();
    $ezizena = $_SESSION['LogIn'];

    // Obtener el dinero ganado del formulario
    $irabazitakoDirua = $_POST["dineroGanado"];

    // Consulta SQL para obtener el valor actual del dinero
    $sql_select = "SELECT * FROM weberabiltzaileak WHERE ezizena = $ezizena";

    $resultado = $conn->query($sql_select);

    if ($resultado->num_rows > 0) {
        // Obtener el valor actual del dinero
        $fila = $resultado->fetch_assoc();
        $dinero_actual = $fila["dirua"];

        // Calcular el nuevo valor sumando el dinero actual y el nuevo valor
        $dinero_nuevo = $dinero_actual + $irabazitakoDirua;

        // Consulta SQL para actualizar el valor del dinero
        $sql_update = "UPDATE weberabiltzaileak SET dirua = $dinero_nuevo WHERE ezizena = $ezizena ";

        // Ejecutar la consulta de actualización
        if ($conn->query($sql_update) === TRUE) {
            echo "Actualización realizada correctamente";
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    } else {
        echo "No se encontraron resultados";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
