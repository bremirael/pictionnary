<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=pictionnary;charset=utf8", "test","test");
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : \n code : '.$e->getCode().' \n info :'.$e->errorInfo(). '\n message : '.$e->getMessage());
}