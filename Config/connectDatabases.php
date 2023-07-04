<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=schoolproject', "root", "root", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
    ]);
} catch (PDOException $e) {
    die("Erreur ! : " . $e->getMessage());
}
