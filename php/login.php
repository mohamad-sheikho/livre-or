<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/livre-or.css">
    <title>Login</title>
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
    <?php
    if (isset($_GET['login_err'])) {

        $error = htmlspecialchars($_GET['login_err']);

        switch ($error) {
            case 'already':
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
    <main class='center'>
        <div class="container">
            <form action="" method="POST" class="login-email">
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
</body>

</html>