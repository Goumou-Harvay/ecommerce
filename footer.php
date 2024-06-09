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

<footer>
    <nav>
        <section class="div2">
            <ul>
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><?php @session_start(); if(isset($_SESSION["auth"])){echo $a;}else{echo $b;}?></li>
                <li><a href="controleur.php?action=destroye">Déconnexion</a></li>
                <li><?php @session_start(); if(isset($_SESSION["auth"])){echo '<a href="mes_annonce.php">Mes annonces</a>';}?></li>
            </ul> 
        </section>
    </nav>
</footer>

