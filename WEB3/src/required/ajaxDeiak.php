<?php
session_start();

if (isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case "registratu": {
            $ezizena = $_POST["ezizena"];
            $emaila = $_POST["email"];
            $pasahitza = $_POST["pasahitza"];

            require_once ("functions.php");

            $conn = connection();

            $sql = "INSERT INTO weberabiltzaileak (ezizena, emaila, pasahitza, dirua, baneado) VALUES ('$ezizena', '$emaila', '$pasahitza', 20000, 0)";

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
            if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
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

                ///////////ERABILTZAILEAREN DATUAK:////////////////////////////////


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
        case "sobreaErosi": {
            if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
                $idZenbakia = $_POST["idZenbakia"];
                //SELECT * FROM balorazioa WHERE zuzen_erantzun = 1 AND valid = 1 and teacher=0 ORDER BY RAND() LIMIT 1;
                switch ($idZenbakia) {
                    case "1": {
                        $premioConsolacion = 100;
                        $sobrearenPrezioa = 500;
                        $sql = "SELECT * FROM jokalariak WHERE puntuazioa>=50 and puntuazioa<=80 ORDER BY RAND() LIMIT 1";
                        break;
                    }
                    case "2": {
                        $premioConsolacion = 200;
                        $sobrearenPrezioa = 1000;
                        $sql = "SELECT * FROM jokalariak WHERE puntuazioa>=70 and puntuazioa<=80 ORDER BY RAND() LIMIT 1";
                        break;
                    }
                    case "3": {
                        $premioConsolacion = 400;
                        $sobrearenPrezioa = 2000;
                        $sql = "SELECT * FROM jokalariak WHERE puntuazioa>=75 and puntuazioa<=95 ORDER BY RAND() LIMIT 1";
                        break;
                    }
                    case "4": {
                        $premioConsolacion = 1000;
                        $sobrearenPrezioa = 4000;
                        $sql = "SELECT * FROM jokalariak WHERE puntuazioa>=85 and puntuazioa<=100 ORDER BY RAND() LIMIT 1";
                        break;
                    }
                }
                require_once ("functions.php");

                $conn = connection();

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        //JOKALARIAREN PREZIOA
                        $jokalariarenIzena = $row["izen"] . $row["abizen"];
                        $jokalariarenId = $row["id"];/////////////////////////////////////////////////////////

                    }
                } else {
                    echo "Jokalaria ez da aurkitu.";
                }








                ////////ERABILTZAILEAREN DATUAK:///////////////////////////////////

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

                if ($result->num_rows == 0) {
                    if ($sobrearenPrezioa <= $erabiltzailearenDirua) {
                        $sql = "INSERT INTO erabiltzaileenjokalariak (idErabiltzaile, idJokalaria, egoera) VALUES ($erabiltzailearenId, $jokalariarenId, 'plantilan')";

                        $stmt = $conn->prepare($sql);
                        $success = $stmt->execute();

                        $kenduBeharrekoDirua = $erabiltzailearenDirua - $sobrearenPrezioa;

                        if ($success) {
                            $sql = "UPDATE weberabiltzaileak
                            SET dirua = $kenduBeharrekoDirua
                            WHERE  id=$erabiltzailearenId";

                            $stmt = $conn->prepare($sql);
                            $success = $stmt->execute();
                            if ($success) {
                                echo "$jokalariarenIzena tokatu zaizu";
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

                    $kenduBeharrekoDirua = $erabiltzailearenDirua + $premioConsolacion;

                    $sql = "UPDATE weberabiltzaileak
                    SET dirua = $kenduBeharrekoDirua
                    WHERE  id=$erabiltzailearenId";

                    $stmt = $conn->prepare($sql);
                    $success = $stmt->execute();
                    if ($success) {
                        echo "$jokalariarenIzena Jokalari hau iada baduzu\nPremio de consolacion: $premioConsolacion €.";
                    } else {
                        echo "Errorea datuak datu-basean sartzerakoan";
                    }



                }


            } else {
                echo "Log in erosketak egiteko.";
            }


            break;
        }
        case "jokoraEman": {
            $idJokalaria = $_POST["botoianId"];

            $ezizena = $_SESSION["LogIn"];
            require_once ("functions.php");

            $conn = connection();

            $sql = "UPDATE erabiltzaileenjokalariak
            SET egoera = 'jokoan'
            WHERE idErabiltzaile = (
                SELECT id
                FROM weberabiltzaileak
                WHERE ezizena = '$ezizena'
            ) AND idJokalaria = $idJokalaria;";

            try {
                $stmt = $conn->prepare($sql);
                $success = $stmt->execute();
                if (!$success) {
                    echo "Errorea datuak datu-basean sartzerakoan";
                }
            } catch (Exception $ex) {
                echo 'Errore bat gertatu da saiatu berandugo berriro ';
            }

            break;
        }
        case "plantilaraEman": {
            $idJokalaria = $_POST["botoianId"];

            $ezizena = $_SESSION["LogIn"];
            require_once ("functions.php");

            $conn = connection();

            $sql = "UPDATE erabiltzaileenjokalariak
            SET egoera = 'plantilan'
            WHERE idErabiltzaile = (
                SELECT id
                FROM weberabiltzaileak
                WHERE ezizena = '$ezizena'
            ) AND idJokalaria = $idJokalaria;";

            try {
                $stmt = $conn->prepare($sql);
                $success = $stmt->execute();
                if (!$success) {
                    echo "Errorea datuak datu-basean sartzerakoan";
                }
            } catch (Exception $ex) {
                echo 'Errore bat gertatu da saiatu berandugo berriro ';
            }
            break;
        }
        case "jolastu": {
            $apostua = $_POST["apostua"];

            $primeraMitad = $_POST["primeraMitad"];
            $segundaMitad = $_POST["segundaMitad"];

            $taldearenMedia = $_POST["taldearenMedia"];
            $taldearenDirua = $_POST["taldearenDirua"];
            if ($apostua <= $taldearenDirua) {
                $ordenagailuarenPuntuazioRand = rand($primeraMitad, $segundaMitad);
                require_once ("functions.php");

                $conn = connection();
                if ($taldearenMedia > $ordenagailuarenPuntuazioRand) {
                    $irabazlearenGolak = rand(2, 5);
                    $galtzailearenGolak = $irabazlearenGolak - rand(1, 2);


                    echo "Partidoa irabazi duzu $irabazlearenGolak-$galtzailearenGolak\n";

                    $ezizena = $_SESSION["LogIn"];
                    $sql = "UPDATE weberabiltzaileak
                    SET dirua = dirua+$apostua
                    WHERE ezizena= '$ezizena';";
                    $irabazi = true;
                } elseif ($taldearenMedia < $ordenagailuarenPuntuazioRand) {
                    $irabazlearenGolak = rand(2, 5);
                    $galtzailearenGolak = $irabazlearenGolak - rand(1, 2);

                    echo "Partidoa galdu duzu $galtzailearenGolak-$irabazlearenGolak\n";

                    $ezizena = $_SESSION["LogIn"];
                    $sql = "UPDATE weberabiltzaileak
                    SET dirua = dirua-$apostua
                    WHERE ezizena= '$ezizena';";
                    $irabazi = false;
                } else {
                    $irabazlearenGolak = rand(2, 5);
                    $galtzailearenGolak = $irabazlearenGolak - rand(1, 2);

                    echo "Partidoa galdu duzu $galtzailearenGolak-$irabazlearenGolak\n";

                    $ezizena = $_SESSION["LogIn"];
                    $sql = "UPDATE weberabiltzaileak
                    SET dirua = dirua-$apostua
                    WHERE ezizena= '$ezizena';";
                    $irabazi = false;
                }

                $stmt = $conn->prepare($sql);
                $success = $stmt->execute();
                if ($success) {
                    if ($irabazi) {
                        echo $apostua . "€ Irabazi dituzu";
                    } else {
                        echo $apostua . "€ Galdu dituzu";
                    }
                } else {
                    echo "Errorea datuak datu-basean sartzerakoan";
                }
            } else {
                echo "Ezdaukazu diru nahikoa";
            }



            break;
        }
        case "sessionenSartu": {
            $taldearenMedia = $_POST["taldearenMedia"];
            $_SESSION["media"] = $taldearenMedia;


            break;
        }
        case "diruaGehitu": {
            require_once ("functions.php");
            $conn = connection();
            $ezizena = $_SESSION['LogIn'];

            // Obtener el dinero ganado del formulario
            $irabazitakoDirua = $_POST["dineroGanado"];



            // Consulta SQL para actualizar el valor del dinero
            $sql = "UPDATE weberabiltzaileak SET dirua = dirua + $irabazitakoDirua WHERE ezizena = '$ezizena'; ";

            $stmt = $conn->prepare($sql);
            $success = $stmt->execute();
                


            // Cerrar la conexión
            $conn->close();


            break;
        }
    }
} else {
    echo "Error: Invalid action.";
}