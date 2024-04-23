<?php

require_once ("define.php");
if (count($_POST) > 0) {
    switch ($_POST["action"]) {
        case "changeConfig": {
            echo changeConfig($_POST);
            break;
        }
    }
}

function changeConfig($inputValue)
{
    //XML konfigurazioa
    $config = simplexml_load_file(APP_DIR . 'src/required/conf.xml');

    $mainColor = $_POST['mainColor'];
    $footerColor = $_POST['footerColor'];

    $config->mainColor = $mainColor;
    $config->footerColor = $footerColor;

    $config->asXML(APP_DIR . 'src\required\conf.xml');

    $returnUrl = isset($_POST['returnUrl']) ? $_POST['returnUrl'] : '/views/guriBuruz/index.php'; // Usa una página por defecto si no se proporciona returnUrl
    header('Location: ' . $returnUrl);
    exit;
}