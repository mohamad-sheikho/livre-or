<?php
// demarrage de la session
session_start();

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
    <title>Login</title>
</head>

<body>
    <!----------------------------------- Header------------------------------------------>
    <header class="main-head">
        <nav>
            <h1 id="logo">Golden Book</h1>
            <ul>
                <li><a href="../index.php">Home</a></li>
                
                <li><a href="register.php">Inscription</a></li>
                <li><a href="login.php">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <!----------------------------------- fin Header------------------------------------------>
    <?php
    if (isset($_GET['login_err'])) { // on verifie que la variable GET créer dans le fichier treatment existe

        $error = htmlspecialchars($_GET['login_err']); // on l'insere dans une variable 

        switch ($error) { // on a crée un switch pour traiter les erreurs récupérées
            case 'already':
                //On utilise des fermetures/ouvertures au milieu des boucles pour faciliter l'utilisation de HTLM et CSS pour afficher les erreurs
    ?>
                <div class="erreur">
                    <strong>ERREUR</strong>Le nom d'utilisateur ou le mot de passe est incorrect.
                </div>
            <?php
                break;

            case 'password':
            ?>
                <div class="erreur">
                    <strong>ERREUR</strong>Le nom d'utilisateur ou le mot de passe est incorrect.
                </div>
    <?php
                break;
        }
    }
    ?>
    <!----------------------------------- formulaire de connexion recuperer de module connexion------------------------------------------>
    <main class='center'>
        <div class="container">
            <form action="login_treatment.php" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="text" placeholder="login" name="login" value="" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a></p>
            </form>
        </div>
    </main>
    <!----------------------------------- fin------------------------------------------>
</body>

</html>