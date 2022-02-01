<?php
//Démarrer la session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Accueil" content="Page d'accueil">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/livre-or.css">
    <title>Accueil</title>
</head>

<body>
    <!----------------------------------- Header------------------------------------------>
    <header class="main-head">
        <nav>
            <h1 id="logo">Golden Book</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="php/livre_or.php">Livre d'or</a></li>
                
                <li><a href="php/register.php">Inscription</a></li>
                <li><a href="php/login.php">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <!-------------------------------- Fin Header-------------------------------------------->

    <!----- parti acceuil------->
    <div class="accueil">
        <h1>Bienvenue dans mon livre d'or !</h1>
    </div>
    <div class="img-index">
    <img src="https://acegif.com/wp-content/gifs/book-65.gif">
    </div>
    <!--------------------------------- FIN--------------------------------------------------->

    <!------------------------------footer------------------------------------------------------>
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
    <!--------------------------FIN footer------------------------------------>
</body>

</html>