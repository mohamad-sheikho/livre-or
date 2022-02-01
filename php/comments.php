<?php
// démarrage de la session
session_start();
require_once 'config.php'; // ajout connexion bdd 


// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:livre_or.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $db->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/livre-or.css">
    <title>Document</title>
</head>

<body>
    <header class="main-head">
        <nav>
            <h1 id="logo">Golden Book</h1>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="livre_or.php">Livre d'or</a></li>
                <li><a href="comments.php">Commentaires</a></li>
                <li><a href="logout.php">Déconnexion</a></li>

            </ul>
        </nav>
    </header>
    <?php

    if (isset($_GET['com_err'])) {
        $Comm = $_GET['com_err'];
        switch ($Comm) {
            case 'court':
    ?>
                <div class="erreur">
                    Votre commentaire est trop court (minimum 5 caractères) !
                </div>
            <?php
                break;

            case 'empty':
            ?>
                <div class="erreur">
                    Impossible d'enregistrer un commentaire vide.
                </div>
    <?php
                break;
        }
    }
    ?>
    <main class='center'>
        
        <div class="container">
            <form action="comments_treatment.php" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Commenter !</p>
                <div class="input-group">
                    <input placeholder="ex :j'adore le kebab" name="commentaire" value="" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Envoyer</button>
                </div>

            </form>
        </div>
    </main>



</body>

</html>