<?php
include_once 'model.php';
$product = getProduct($_GET['id']);
if (!$product) {
    header('Location: index.php');
    exit();
}
include ("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Produit</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Modifier le Produit</h1>
    <form action="controleur.php?action=edit_product&id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="name">Nom du produit:</label>
            <input type="text" id="name" name="name" value="<?php echo ($product['name']); ?>" required><br>
            
            <label for="price">Prix:</label>
            <input type="text" id="price" name="price" value="<?php echo ($product['price']); ?>" required><br>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo ($product['description']); ?></textarea><br>
            
            <label for="shipping">Livraison:</label>
            <select id="shipping" name="shipping">
                <option value="yes" <?php if ($product['shipping']) echo 'selected'; ?>>Oui</option>
                <option value="no" <?php if (!$product['shipping']) echo 'selected'; ?>>Non</option>
            </select><br>
            
            <label for="categorie">Catégorie:</label>
            <input type="text" id="categorie" name="categorie" value="<?php echo ($product['categorie']); ?>" required><br>
            
            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville" value="<?php echo ($product['city']); ?>" required><br>
            
            <label for="image">Image:</label>
            <input type="file" id="image" name="image"><br>
            <input type="hidden" name="existing_image" value="<?php echo ($product['image']); ?>">

            <label for="contact">Contact du vendeur:</label>
            <input type="text" id="contact" name="contact" required><br>
        </fieldset>
        
        <button type="submit">Modifier</button>
    </form>
</body>
</html>

