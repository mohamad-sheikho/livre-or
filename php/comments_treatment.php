<?php
session_start();

require_once('config.php');// ajout connexion base de donnée 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:../index.php');
    die();
}
//on recupere les donnée de l'utilisateurs 
$req = $db->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
 // on verifie si la case com n'est pas vide malgre le required
if (!empty($_POST['commentaire'])) {
    // on recupere le commentaire 
    $commentaire = htmlspecialchars($_POST['commentaire']);
    // on cree une variable avec la date atcuelle 
    $date = new DateTime();
    // on donne le format qui conviens a la date
    $date->format('Y-m-d H:i:s');
    // mtn on vérifie si le commentaire est au moins de  caract
    if (strlen($commentaire) >= 5) {
        // on insert dans la base de donnée 
        $insert = $db->prepare('INSERT INTO commentaires(commentaire,id_utilisateur,date) VALUES(:commentaire,:id_utilisateur,NOW())');
        
        $insert->execute(array(
            'commentaire' => $commentaire,
            'id_utilisateur' => intval($data['id']),
        ));
        // on redirige avce succès
        header('Location:livre_or.php?com_err=success');
        die();
    } else {
        header('Location:comments.php?com_err=court');
    }
} else {
    header('Location:comments.php?com_err=empty');
}
?>