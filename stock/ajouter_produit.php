<?php include_once 'controleur.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Produit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: red;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color:red;
            color: white;
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
    <h1>Ajouter un Produit</h1>
    <form action="ajouter_produit.php" method="POST" enctype="multipart/form-data">
        <label for="name">Nom du produit:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="price">Prix:</label>
        <input type="text" id="price" name="price" required><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>
        
        <label for="shipping">Livraison:</label>
        <select id="shipping" name="shipping">
            <option value="yes">Oui</option>
            <option value="no">Non</option>
        </select><br>
        
        <label for="categorie">Catégorie:</label>
        <input type="text" id="categorie" name="categorie" required><br>
        
        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" required><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br>
        
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $shipping = ($_POST["shipping"] == "yes") ? true : false;

    $dossier = "images/";
    $imageTmpPath = $_FILES['image']['tmp_name'];
    $imageName = basename($_FILES['image']['name']);
    $uploadPath = $dossier . $imageName;

    if (is_uploaded_file($imageTmpPath) && move_uploaded_file($imageTmpPath, $uploadPath)) {
        $image = $imageName;
        $categorie = $_POST["categorie"];
        $city = $_POST["ville"];
        ajouter($name, $price, $description, $shipping, $image, $categorie, $city);
        header("Location: index.php");
        exit();
    } else {
        echo "Échec de l'upload de l'image.";
    }
}
?>
