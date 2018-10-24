<?php 
    include('/home/zlyfer/tokens/sql_credentials.php'); //SQL Daten
    $sqlServer = "127.0.0.1"; //SQL ServerAdresse
    $sqlDatabase = "VPlan"; //SQL Datenbank


    $sql = new MySQLi($sqlServer, $sqlUser, $sqlPassword, $sqlDatabase); //Verbindung zu MySQL
    $sql->set_charset("utf8");
