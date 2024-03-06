<?php


if (isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case "registratu": {
            $ezizena = $_POST["ezizena"];
            $emaila = $_POST["email"];
            $pasahitza = $_POST["pasahitza"];

            require_once("functions.php");

            $conn = connection();

            $sql = "INSERT INTO weberabiltzaileak (ezizena, emaila, pasahitza, dirua, baneado) VALUES ('$ezizena', '$emaila', '$pasahitza', 10000, 0)";

            try {
                $stmt = $conn->prepare($sql);
                $success = $stmt->execute();
                if ($success) {
                    echo "Erregistroa zuzen egin da!";
                } else {
                    echo "Errorea datuak datu-basean sartzerakoan";
                }
            } catch (Exception $ex) {
                echo 'Email edo ezizen horrekin iada existitzen da kontu bat';
            }

            break;
        }
        case "logeatu": {
            $emaila = $_POST["email"];
            $pasahitza = $_POST["pasahitza"];

            require_once("functions.php");

            $conn = connection();

            $sql = "SELECT * FROM weberabiltzaileak where emaila = '$emaila' and pasahitza = '$pasahitza'";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $ezizenaPertsonaHorrena = $row["ezizena"];
            }
            echo "Zure ezizena hau da:" . $ezizenaPertsonaHorrena;

            break;
        }
    }
} else {
    echo "Error: Invalid action.";
}