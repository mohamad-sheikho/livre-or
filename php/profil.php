<?php
// demarrer la session
session_start();

require_once('config.php'); // on se relie a la base de donnée
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:../index.php');
    die();
}
// On récupere les données de l'utilisateur
$req = $db->prepare('SELECT * FROM utilisateurs WHERE id  = ?');
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
    <title>Modifier votre profil</title>
</head>

<body>
    <!------------------------------------------header---------------------------------------------->
    <header class="main-head">
        <nav>
            <h1 id="logo">Golden Book</h1>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="livre_or.php">Livre d'or</a></li>
                <li><a href="#">Commentaires</a></li>

            </ul>
        </nav>
    </header>
    <!----------------------------------------fin------------------------------------------------->
    <?php

    if (isset($_GET['profil_err'])) {
        $err = htmlspecialchars($_GET['profil_err']);
        switch ($err) {
            case 'fail_check_pass':
    ?>
                <div class='erreur'>Le mot de passe actuel est incorrect</div>
    <?php
                break;
        }
    }
    ?>
    <!-------------------------------------------Formulaire de modification récuperer de module connexion---------------------------------------------->
    <main class="center">
        <div class="container">
            <h1>Vous êtes sur le point de modifier vos informations <?php echo $data['login'] ?></h1>
            <form action="profil_treatment.php" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">modifier profile</p>
                <div class="input-group">
                    <input type="text" placeholder="login" name="login" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" required />
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Nouveau Password" name="passwordChange" required />
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirm Password" name="confirm" required>
                </div>
                <div class="input-group">
                    <button type="submit" name="modifier" class="btn">Modifier</button>
                </div>

            </form>
        </div>
    </main>
<!-----------------------------------------fin------------------------------------------------>

</body>

</html>