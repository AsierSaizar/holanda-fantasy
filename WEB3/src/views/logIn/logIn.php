<?php

require_once("../../required/head.php");
?>

<link rel="stylesheet" href="<?= HREF_SRC_DIR ?>/views/logIn/logIn.css">

<div class="wrapper">
    <div class="right">
        

        <div class="tabs">
            <ul>
                <li class="register_li">Register</li>
                <li class="login_li">Login</li>
            </ul>
        </div>

        <div class="register">
            <div class="input_field">
                <input id="ezizena" type="text" placeholder="Username" class="input">
            </div>
            <div class="input_field">
                <input id="emailaRegist" type="text" placeholder="E-mail" class="input">
            </div>
            <div class="input_field">
                <input id="pasahitzRegist" type="password" placeholder="Password" class="input">
            </div>
            <div class="btnRegist"><a class="btnRegistletra" href="#">Register</a></div>
        </div>

        <div class="login">
            <div class="input_field">
                <input id="emailaLog" type="text" placeholder="E-mail" class="input">
            </div>
            <div class="input_field">
                <input id="pasahitzaLog" type="password" placeholder="Password" class="input">
            </div>
            <div class="btnLogIn"><a class="btnLogInletra" href="#">Login</a></div>
        </div><br>
        <div class="logOut">
            <center><button class="logOutBtn"><i class="fa-solid fa-right-from-bracket"></i>Log Out</button></center>
        </div>
    </div>
</div>
