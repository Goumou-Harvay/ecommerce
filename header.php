<!DOCTYPE html>
<?php
    if(basename($_SERVER["PHP_SELF"]) == "login.php"){
        $a = '<a href="registre.php">Inscription </a>';
        $b = '<a href="registre.php">Inscription </a>';
    }
    else{
        $a = '<a href="ajouter_produit.php">Ajouter un produit</a>';
        $b = '<a href="login.php" ">Ajouter un produit</a>';
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Mon Site E-commerce</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/ecommerce.png">
</head>
<body>
    <head>
        <nav class="nav">
            <span><a href="index.php"><img src="images/ecommerce.png" alt="" style="width: 50px; height: 54px;"></a></span>
                <div>
                    <ul>
                        <li><a href="login.php">Connexion</a></li>
                        <li><?php @session_start(); if(isset($_SESSION["auth"])){echo $a;}else{echo $b;}?></li>
                        <li><a href="controleur.php?action=destroye">Déconnexion</a></li>
                        <li><?php @session_start(); if(isset($_SESSION["auth"])){echo '<a href="mes_annonce.php">Mes annonces</a>';}?></li>
                    </ul> 
                </div>
            
        </nav>
    </head>