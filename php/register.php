<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../css/livre-or.css">

    <title>Register</title>
</head>

<body>
    <header class="main-head">
        <nav>
            <h1 id="logo">Livre d'or</h1>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Commentaires</a></li>
                <li><a href="register.php">Inscription</a></li>
                <li><a href="login.php">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <main class='center'>
        <?php
        if (isset($_GET['error_register'])) { //On vérifie que la variable GET créer dans le fichier traitement existe 
            $error = $_GET['error_register']; //On l'insère dans une variable
            switch ($error) { //On créer un switch pour traiter les erreurs récupérées
                case 'password':
                    //On utilise des fermetures/ouvertures au milieu des boucles pour faciliter l'utilisation de HTLM et CSS pour afficher les erreurs       
        ?>
                    <div class="error">
                        <strong>ERREUR!</strong>Les deux mots de passes ne sont pas identiques.</div>
                <?php

                    break;
                case 'already':
                ?>
                    <div class="error"><strong>ERREUR!</strong>Ce nom d'utilisateur est déjà attribué.</div>
                <?php
                    break;
                case 'empty':
                ?>
                    <div class="error"><strong>ERREUR!</strong>Veuillez remplir tout les champs pour procéder à l'inscription.</div>
        <?php
                    break;
            }
        }
        ?>
        <div class="container">
            <form action="register_treatment.php" method="POST" class="login-email">
                <p class="login-text" style="font-size: 3rem; font-weight: 800;">Register</p>
                <div class="input-group">
                    <input type="text" placeholder="login" name="login" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirm Password" name="confirm" required>
                </div>
                <div class="input-group">
                    <button type="submit" name="submit" class="btn">Register</button>
                </div>
                <p class="login-register-text"> Have an account ? <a href="login.php"> Login Here</a>.</p>
            </form>
        </div>

    </main>

</body>

</html>