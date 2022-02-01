<?php 


include 'config.php'; // relier a la base de donnée
session_start(); // demarrage de la session
session_destroy();// quitter la session

header("Location: ../index.php"); //rediriger vers index.php

?>