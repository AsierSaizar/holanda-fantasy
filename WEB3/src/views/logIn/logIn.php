<?php

require_once("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/logIn/logIn.css">

<div class="wrapper">
    <div class="right">
        

        <div class="tabs">
            <ul>
                <li class="register_li"><?= trans("register") ?></li>
                <li class="login_li"><?= trans("login") ?></li>
            </ul>
        </div>

        <div class="register">
            <div class="input_field">
                <input id="ezizena" type="text" placeholder="<?= trans("username") ?>" class="input">
            </div>
            <div class="input_field">
                <input id="emailaRegist" type="text" placeholder="E-mail" class="input">
            </div>
            <div class="input_field">
                <input id="pasahitzRegist" type="password" placeholder="<?= trans("password") ?>" class="input">
            </div>
            <div class="btnRegist"><a class="btnRegistletra" href="#"><?= trans("register") ?></a></div>
        </div>

        <div class="login">
            <div class="input_field">
                <input id="emailaLog" type="text" placeholder="E-mail" class="input">
            </div>
            <div class="input_field">
                <input id="pasahitzaLog" type="password" placeholder="<?= trans("password") ?>" class="input">
            </div>
            <div class="btnLogIn"><a class="btnLogInletra" href="#"><?= trans("login") ?></a></div>
        </div><br>
        <div class="logOut">
            <center><button class="logOutBtn"><i class="fa-solid fa-right-from-bracket"></i><?= trans("logOut") ?></button></center>
        </div>
    </div>
</div>
