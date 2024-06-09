<?php
include_once 'controleur.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Vérification simple du mot de passe (à remplacer par une vérification plus sécurisée)
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Couleur d'arrière-plan */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Pleine hauteur de la fenêtre */
        }

        h1 {
        
            color: red;
        }

        form {
            width: 300px;
            background-color: blue;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Connexion</h1>
    <form action="login.php" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
