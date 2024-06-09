<?php
include_once 'controleur.php';
$product = getProduct($_GET['id']);
if (!$product) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> - Détails</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
    <p>Prix: <?php echo htmlspecialchars($product['price']); ?>€</p>
    <p>Description: <?php echo htmlspecialchars($product['description']); ?></p>
    <p>Ville: <?php echo htmlspecialchars($product['city']); ?></p>
    <p>Catégorie: <?php echo htmlspecialchars($product['categorie']); ?></p>
    <p>Livraison: <?php echo $product['shipping'] ? 'Oui' : 'Non'; ?></p>
    <a href="modifier_produit.php?id=<?php echo $product['id']; ?>">Modifier</a>
    <a href="delete_product.php?id=<?php echo $product['id']; ?>">Supprimer</a>
</body>
</html>