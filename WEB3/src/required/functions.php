<?php
    function connection() {

        //SERVIDOREKO DATU BASEA
        //$servername = "192.168.115.2:3306"; 
        //$username = "2taldea"; 
        //$password = "2taldea@";
        //$dbname = "erronka2";
        
        //LOCALEKO DATU BASEA
        $servername = "localhost"; 
        $username = "root"; 
        $password = "1WMG2023";  
        $dbname = "erronka3";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        
        if ($conn->connect_error) {
            die("Errorea: " . $conn->connect_error);
        } 

        return $conn;
    }

