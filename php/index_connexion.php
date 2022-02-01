<?php
// démarrer la session 
session_start();

require_once('config.php');// configuerer a la base de donnée 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:../index.php');
    die();
}

//on recupere les donnée de l'utilisateurs 
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
    <title>Bienvenue</title>
</head>

<body>
    <header class="main-head">
        <nav>
            <h1 id="logo">Golden Book</h1>
            <ul>
                <li><a href="comments.php">Commentaires</a></li>
                <li><a href="profil.php">Modifier votre Profil</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
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
                    <div class="img-index">
                    <img src="https://acegif.com/wp-content/gifs/book-65.gif" alt="image de livre">
                </div>
                </div>
            <?php
                break;
            case 'connect':
            ?>
                <div class="accueil">
                    <h1>Bienvenue dans votre compte <?= $_SESSION['login'] ?> !</h1>
                    <div class="img-index">
                    <img src="https://acegif.com/wp-content/gifs/book-65.gif" alt="image de livre">
                </div>
                </div>
            <?php
                break;
            case 'success_pass':
            ?>
                <div class="accueil">
                    <h1>Vos informations ont été changés avec succés !</h1>
                    <div class="img-index">
                    <img src="https://acegif.com/wp-content/gifs/book-65.gif" alt="image de livre">
                </div>
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
                        <li><a href="https://github.com/mohamad-sheikho?tab=repositories">- Github</a></li>
                        <li><a href="#">- +33484894369</a></li>
                        <li><a href="#">- laplateforme@laplateforme.io</a></li>
                    </ul>
                </div>  
            </div>

    </footer>
</body>
</body>

</html>