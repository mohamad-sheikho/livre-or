<?php

try {

$db = new PDO  ("mysql:host = localhost ;dbname=livreor", 'root' , ''); 

$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "ERREUR :" . " ". $e->getMessage();
}