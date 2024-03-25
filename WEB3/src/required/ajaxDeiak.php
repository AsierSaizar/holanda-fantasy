<?php
session_start();

if (isset ($_POST["action"])) {
    switch ($_POST["action"]) {
        case "registratu": {
            $ezizena = $_POST["ezizena"];
            $emaila = $_POST["email"];
            $pasahitza = $_POST["pasahitza"];

            require_once ("functions.php");

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

            require_once ("functions.php");

            $conn = connection();

            $sql = "SELECT * FROM weberabiltzaileak where emaila = '$emaila' and pasahitza = '$pasahitza'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ezizenaPertsonaHorrena = $row["ezizena"];
                }
                $_SESSION["LogIn"] = $ezizenaPertsonaHorrena;
            } else {
                echo "Emaila edo pasahitza ez da zuzena.";
            }

            break;
        }
        case "logOut": {
            if (($_SESSION['LogIn']) != "") {
                $_SESSION["LogIn"] = "";
                echo "Sesioa ondo itxi da.";
            } else {
                echo "no";
            }

            break;
        }
        case "JokalariaErosi": {
            if ((isset ($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
                $idZenbakia = $_POST["idZenbakia"];

                require_once ("functions.php");

                $conn = connection();

                $sql = "SELECT * FROM jokalariak where id = '$idZenbakia'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        //JOKALARIAREN PREZIOA
                        $jokalariarenId = $row["id"];/////////////////////////////////////////////////////////
                        $jokalariarenPrezioa = $row["prezioa"];
                    }
                } else {
                    echo "Jokalaria ez da aurkitu.";
                }

                ///////////////////////////////////////////


                $ezizena = $_SESSION["LogIn"];

                $sql = "SELECT * FROM weberabiltzaileak WHERE ezizena = '$ezizena'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $erabiltzailearenId = $row["id"];/////////////////////////////////////////////////////
                        $erabiltzailearenDirua = $row["dirua"];
                    }
                } else {
                    echo "ez dago ezizen horrekin usuariorik.";
                }

                ////////////////BERIFIKATU ABER BADAUKAN JOKALARI HOI YA EROSITA///////////////////////////////////////////////////////


                $sql = "SELECT * FROM erabiltzaileenjokalariak WHERE idErabiltzaile = $erabiltzailearenId AND idJokalaria = $jokalariarenId";
                $result = $conn->query($sql);

                if ($result->num_rows <= 0) {
                    if ($jokalariarenPrezioa <= $erabiltzailearenDirua) {

                        $sql = "INSERT INTO erabiltzaileenjokalariak (idErabiltzaile, idJokalaria, egoera) VALUES ($erabiltzailearenId, $jokalariarenId, 'plantilan')";

                        $stmt = $conn->prepare($sql);
                        $success = $stmt->execute();

                        $kenduBeharrekoDirua = $erabiltzailearenDirua - $jokalariarenPrezioa;

                        if ($success) {
                            $sql = "UPDATE weberabiltzaileak
                            SET dirua = $kenduBeharrekoDirua
                            WHERE  id=$erabiltzailearenId";

                            $stmt = $conn->prepare($sql);
                            $success = $stmt->execute();
                            if ($success) {
                                echo "Erregistroa zuzen egin da!";
                            } else {
                                echo "Errorea datuak datu-basean sartzerakoan";
                            }
                        } else {
                            echo "Errorea datuak datu-basean sartzerakoan";
                        }






                    } else {
                        echo "Ez daukazu diru nahikoa.";
                    }
                } else {
                    echo "Jokalari hau iada erosita duzu.";
                }


            } else {
                echo "Log in erosketak egiteko.";
            }


            break;
        }
    }
} else {
    echo "Error: Invalid action.";
}