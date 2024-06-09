<?php
include_once 'controleur.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Enregistrement simple de l'utilisateur (à remplacer par une méthode plus sécurisée)
    if ($username && $password) {
        // Enregistrer l'utilisateur dans la base de données
        // Note: Vous devez ajouter une table `users` et une fonction pour gérer l'enregistrement des utilisateurs
        echo "Inscription réussie. Vous pouvez maintenant vous <a href='login.php'>connecter</a>.";
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Inscription</h1>
    <form action="registre.php" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>