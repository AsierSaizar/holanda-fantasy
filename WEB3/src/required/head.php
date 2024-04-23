<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once ("define.php");
    $link = APP_DIR . "src/language/translations.php";
    require_once ($link); //APP_DIR erabilita itzulpenen dokumentua atzitu dugu.
    

    //XMLko konfiguraziotik hartzen dute informazioa
    
    $config = simplexml_load_file(APP_DIR . "src/required/conf.xml");

    $mainColor = $config->mainColor;
    $footerColor = $config->footerColor;


    ?>
    <style>
        :root {
            --mainColor:
                <?= $mainColor ?>
            ;
            --footerColor:
                <?= $footerColor ?>
            ;
        }

        /* AZPIAN EGON BEAHR DA CSS-a mainColor eta footerColor erabiltzen dituztenak */
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holanda Fantasy</title>

    <!-- SIDE BARRANTZAT DA HAUUU //////////////////-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://kit.fontawesome.com/7f605dc8fe.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/css/header.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= HREF_SRC_DIR ?>/required/script.js"></script>

</head>

<body>
    <header class="header">
        <div class="container">

            <!-- SIDE BARRANTZAT DA HAUUU //////////////////-->
            <div>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>


            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">
                        <center><b>HOLANDA FANTASY</b></center>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="navSideBar">
                        <nav>
                            <ul>
                                <b>
                                    <li><a href="<?= HREF_SRC_DIR ?>/views/guriBuruz/index.php"><?= trans("guriBuruz") ?></a></li>
                                    <br><br>
                                    <li><a href="<?= HREF_SRC_DIR ?>/views/datuKuriosoak/datuKuriosoak.php"><?= trans("DatuKuriosoak") ?></a></li><br><br>
                                    <li><a href="<?= HREF_SRC_DIR ?>/views/test/test.php">Test</a></li><br><br>
                                    <li><a href="<?= HREF_SRC_DIR ?>/views/jokalariDenda/jokalariDenda.php"><?= trans("JokalariDenda") ?></a></li><br><br>
                                    <li><a href="<?= HREF_SRC_DIR ?>/views/plantilla/plantilla.php"><?= trans("plantila") ?></a></li>
                                    <br><br>
                                </b>
                            </ul>
                        </nav>
                    </div>
                    
                    
                    <div class="laburpenaDiv">
                        <center>
                        <h6><b><?= trans("KolorKonf") ?>:</b></h6>
                            <form action="<?= HREF_SRC_DIR ?>/required/post.php" method="post">
                                <input type="hidden" value="changeConfig" name="action" />
                                <input type="hidden" value="<?= $_SERVER['REQUEST_URI'] ?>" name="returnUrl" />
                                <div>
                                    <div>
                                        <label for="mainColor"><?= trans("mainColor") ?>:</label>
                                     
                                        <input type="color" id="mainColor" name="mainColor"
                                            value="<?= $config->mainColor ?>" />
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="footerColor"><?= trans("secondColor") ?>:</label>
                                    
                                        <input type="color" id="footerColor" name="footerColor"
                                            value="<?= $config->footerColor ?>" />
                                    </div>
                                </div>
                                <button class="GordeBtn" type="submit"><?= trans("Gorde") ?></button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
            <!-- SIDE BARRANTZAT DA HAUUU //////////////////-->



            <div class="input__container">
                <div class="shadow__input"></div>
                <button class="input__button__shadow" id="search-button">
                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="20px" width="20px">
                        <path
                            d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z"
                            fill-rule="evenodd" fill="#17202A"></path>
                    </svg>
                </button>
                <input id="search-input" type="text" name="text" class="input__search" placeholder="<?= trans("search") ?>">
            </div>



            <div class="language">
                <div class="header grid-elem">
                    <?php require_once (APP_DIR . "/src/required/selectLang.php"); ?>
                </div>
            </div>

            <?php

            if ((isset($_SESSION['LogIn'])) and (($_SESSION['LogIn']) != "")) {
                $ezizena = $_SESSION["LogIn"];
            } else {
                $ezizena = trans("logIn");
            }
            ?>
            <div class="logInBtn">
                <a class="logInBtnA" href="<?= HREF_SRC_DIR ?>/views/logIn/logIn.php"><?= $ezizena ?></a>
            </div>
        </div>
    </header>
    <div class="content">
        <!-- Aquí iría el contenido principal de tu página -->
    </div>