<?php
session_start();

require_once('config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../index.php');
    die();
}


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
    <link rel="stylesheet" type="text/css" href="../css/livre-or.css">
    <title>Document</title>
</head>

<body>
    <header class="main-head">
        <nav>
            <h1 id="logo">Livre d'or</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Commentaires</a></li>
                <li><a href="php/register.php">Inscription</a></li>
                <li><a href="php/login.php">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <?php
    if (isset($_GET['login_err'])) {

        $success = htmlspecialchars($_GET['login_err']);
        switch ($success) {
            case 'success':
    ?>
                <div class="accueil">
                    <h1>Bienvenue, vous vous êtes inscrit avec succés !</h1>
                    <img src="https://acegif.com/wp-content/gifs/book-65.gif" alt="image de livre">
                </div>
            <?php
                break;
            case 'connect':
            ?>
                <div class="accueil">
                    <h1>Bonjour <?= $_SESSION['login'] ?> !</h1>
                    <img src="https://acegif.com/wp-content/gifs/book-65.gif" alt="image de livre">
                </div>
            <?php
                break;
            case 'success_pass':
            ?>
                <div class="accueil">
                    <h1>Vos informations ont été changés avec succés !</h1>
                    <img src="https://acegif.com/wp-content/gifs/book-65.gif" alt="image de livre">
                </div>
    <?php
                break;
        }
    }
    ?>

    <footer class="footer">
        <div class="container1">
            <div class="row">
                <div class="footer-col">
                    <h4>Contacts</h4>
                    <ul>
                        <li><a href="#">- Github</a></li>
                        <li><a href="#">- +33484894369</a></li>
                        <li><a href="#">- laplateforme@laplateforme.io</a></li>

                    </ul>
                </div>
            </div>

    </footer>
</body>
</body>

</html>