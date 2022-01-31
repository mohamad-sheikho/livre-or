<?php
require 'config.php'; //liaison à la base de données 

//On vérifie que les champs ne sont pas vides
if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {

    $login = trim(htmlspecialchars($_POST['login'])); //On utilise "trim" pour enlever les espaces involontaires et "htmlspecialchars" pour les caractères spéciaux et éviter les requêtes SQL
    $password = trim(htmlspecialchars($_POST['password']));
    $confirm = trim(htmlspecialchars($_POST['confirm']));


    $req = "SELECT * FROM utilisateurs WHERE login = $login";
    $check = $db->prepare($req); //On prépare la requète
    $row = $check->rowCount(); //On utilise "rowCount" pour compter le nombre de colonnes qui contiennent "$login"
    if ($row == 0) { //On dit que si le nombre de colonnes est de 0 alors le nom d'utilisateur n'est pas attribué
        if ($password === $confirm) { //Confirmation du password
            $password = password_hash($password, PASSWORD_DEFAULT); //On hash le password et on utilise "password_hash" pour faciliter le "password_verify" de la page connexion

            $requete = "INSERT INTO utilisateurs (login, password) VALUES (:login, :password) ";
            $req = $db->prepare($requete);
            $req->execute(array(':login' => $login, ':password' => $password));
            

            header('Location: ../index.php?login_err=success');
            //On créer des variables pour faciliter le traitement et la mise en forme des erreurs récupérées
        } else {
            header('Location:register.php?error_register=password');
        }
    } else {
        header('Location:register.php?error_register=already');
    }
} else {
    header('Location:register.php?error_register=empty');
}
