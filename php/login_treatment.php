<?php
// démarrage de la session
session_start(); 
require ('config.php');// configuerer a las base de donnée
$sesslogin = $_SESSION['login'] ; 


if (!empty (isset($_POST['login'])) && !empty (isset($_POST['password']))) { // Si il existe les champs login, password et qu'il sont pas vident
    
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']); 
    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
    $check = $db->prepare('SELECT * FROM utilisateurs WHERE login = ?');
    $check->execute(array($login));
    $data = $check->fetch();     
    $row = $check->rowCount(); 
    // Si > à 0 alors l'utilisateur existe
    if ($row > 0 ) {
        
        // Si le mot de passe est le bon
        if (password_verify($password , $data['password'])) {
            // On créer la session et on redirige sur index.php
            $_SESSION['user'] = $data['id'];
            $_SESSION['login'] = $data['login'];

            header('Location: index_connexion.php?login_err=connect');
            die();
        }
        else {
            header('Location:login.php?login_err=password');
        }
    } 
    else {
        header('Location:login.php?login_err=already');
    }
}
else {
    header('Location:login.php?login_err=empty');// si le formulaire est envoyé sans aucune données
}