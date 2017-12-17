<?php
session_start();

include_once "connector.php";



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Pictionnary - Main page</title>
    <link rel="stylesheet" media="screen" href="css/styles.css" >
    <link rel="stylesheet" media="screen" href="css/bootstrap.css" >

</head>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

            <?php
                if (isset($_SESSION['prenom']))
                { ?>
                    <li class="nav-item">
                        <a class="nav-link">Bienvenue <?php echo $_SESSION['prenom'].' '. $_SESSION['nom']; ?> </a>
                    </li>
                    <li class="nav-item">
                        <img src="<?php echo base64_decode($_SESSION['profilepic']); ?>" alt="" />
                    </li>
            <?php } else {?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pictionnary</a>
                </li>
            <?php } ?>
        </ul>


            <a href="inscription.php" class="btn btn-outline-success my-2 my-sm-0">Inscription</a>

            <?php
            if (isset($_SESSION['nom']))
            { ?>
                <a href="logout.php" class="btn btn-outline-success my-2 my-sm-0">Déconnexion</a>
            <?php } else { ?>
                <a href="req_login.php" class="btn btn-outline-success my-2 my-sm-0">Connexion</a>
            <?php } ?>

    </div>
</nav>