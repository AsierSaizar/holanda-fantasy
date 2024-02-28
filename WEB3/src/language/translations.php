
<?php

// EKINTZAK
session_start();
//Sesioa hasten dugu bertan gordetzeko zein hizkuntzatan ari garen

if (!isset($_SESSION["_LANGUAGE"])) { //Sesioan hizkuntza ez bada gorde
    //Defektuzko hizkuntza jartzen dugun funtzioari deitzen diogu
    setSessionLanguageToDefault();
}

changeSessionLanguage(); //Beti funtzio hontan sartzen gara


/** FUNTZIOAK */
function setSessionLanguageToDefault()
{
  $_SESSION["_LANGUAGE"] = "eus"; //Defektuz "eus" hizkuntza jartzen dugu (hemen "en" jarri ezkero, language karpetan en.php izeneko fitxategi bat egon beharko litzateke)
}

function changeSessionLanguage()
{
  /** post batean informazioa datorrenean bakarrik aldatuko da */
  if (isset($_POST["selectedLang"])) {
    $_SESSION["_LANGUAGE"] = $_POST["selectedLang"]; //post-ean datorren hizkuntza jarriko du sesioko aldagaiean
  }

}
function trans($indexPhrase)
{
  //Itzulpen array-a sortzen da
  static $tranlationsArray = array();

  //eus.php edo es.php existitzen den begiratzen da
  if (file_exists(APP_DIR . '/src/language/' . $_SESSION["_LANGUAGE"] . '.php')) {
    $url = APP_DIR . '/src/language/';
    //Existitzen bada fitxategi horretan dagoen array-a $translationArray barruan sartzen da
    $tranlationsArray = include( $url . $_SESSION["_LANGUAGE"] . '.php');

  }
  //Array-eko indizearen balioa itzultzen du.
  return (!array_key_exists($indexPhrase, $tranlationsArray)) ? $indexPhrase : $tranlationsArray[$indexPhrase];
}

?>

