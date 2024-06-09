<?php 
session_start();

    if(isset($_SESSION["auth"])){
        if($_SESSION["auth"] == TRUE){
            Header("location:index.php");
        }
    }
    include("header.php");
?>

<body>
    <h1 class="h1">Connexion</h1>
    <form action="controleur.php?action=auth" method="POST">
        <fieldset>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="nom" required><br>
            
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
            
            <button type="submit">Se connecter</button><br>
            <?php if(isset($_GET["error"]))
                echo "<br>" . "<p style='background-color: red;'>votre mot de passe est incorrecte </p>";
                exit;
            ?>
        </fieldset>
    </form>
</body>
</html>