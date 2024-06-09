<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1 class="h1">Inscription</h1>
    <form action="controleur.php?action=ajout" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="nom" required><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>