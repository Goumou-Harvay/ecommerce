<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1 class="h1">Ajouter un Produit</h1>
    <form action="controleur.php?action=ajouter_produit" method="POST" enctype="multipart/form-data">
        <fieldset>
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
        <select name="categorie" required>
            <optgroup label="Market">
                <option value="Sport">Sport</option>
                <option value="Smartphone">Smartphone</option>
                <option value="Vêtement">Vêtement</option>
                <option value="Informatique">Informatique</option>
            </optgroup>
            <optgroup label="Véhicule">
                <option value="Voiture">Voiture</option>
                <option value="Moto">Moto</option>
                <option value="Vélo">Vélo</option>
                <option value="Pièce">Pièce de Véhicule</option>
            </optgroup>
            <optgroup label="Immobilier">
                <option value="Appartements">Appartements</option>
                <option value="Maisons">Maisons</option>
                <option value="Villas">Villas</option>
                <option value="Bureaux">Bureaux</option>
            </optgroup>
            
        </select>
        <br>
        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" required><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br>

        <label for="contact" max="9">Contact du vendeur:</label>
        <input type="text" id="contact" name="contact" required><br>
        </fieldset>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
