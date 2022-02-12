<?php
//démarrage de la session
session_start();

require_once('config.php'); //configurer a la base de donnée 
if (isset($_SESSION['user'])) {
     // On récupere les données de l'utilisateur
    $req = $db->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/livre-or.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
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
    <?php
    if (isset($GET['com_err'])) {
        $com = $GET['com_err'];
        switch ($com) {
            case 'success':

    ?>
                <div class="success">
                    Bravo <?= $_SESSION['login'] ?> ! Vous avez posté votre commentaire avec succés !
                </div>
    <?php
                break;
        }
    }
?>

<?php
    $req = $db->query('SELECT * FROM commentaires');

    while ($livre = $req->fetch()) {
        ?>
        <br> <br>
        <div class="commentaire">
            <div class="info">
                <?=$livre['id_utilisateur']?>  Le <?=$livre['date']?> 
            </div>   

            <div class="txt">
                <?=$livre['commentaire'];?> 
            </div>
        </div> <br> <br>
        <?php
    }
    ?>
</body>

</html>