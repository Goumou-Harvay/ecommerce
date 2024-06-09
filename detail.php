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
    <title><?php echo ($product['name']); ?> - Détails</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <section>
        <div class="div1" style="width: 350px">
            <h1><?php echo ($product['name']); ?></h1>
            <img src="images/<?php echo ($product['image']); ?>" alt="<?php echo ($product['name']); ?>" style="width: 144px;height: 164px;">
            <p>Prix: <?php echo ($product['price']); ?>€</p>
            <p>Description: <?php echo ($product['description']); ?></p>
            <p>Ville: <?php echo ($product['city']); ?></p>
            <p>Catégorie: <?php echo ($product['categorie']); ?></p>
            <p>Livraison: <?php echo $product['shipping'] ? 'Oui' : 'Non'; ?></p>
            <p>Contacter le vendeur : +212 <?php echo ($product['contact']); ?></p>
        </div>
    </section>
<?php
include_once 'model.php';
$products = getcate($product['categorie']);
if (!$products) {
    header('Location: index.php');
    exit();
}
?>
    <section>
        <h1 class="h1">Autres annonces:</h1>
        <div class="div1">
            <?php foreach ($products as $product): ?>
                <div class="" style="display:inline-block;">
                    <a href="detail.php?id=<?php echo $product['id']; ?>"><img src="images/<?php echo $product['image']; ?>" alt="<?php echo ($product['name']); ?>" style="width: 144px;height: 164px;"></a>
                    <h2><?php echo $product['name']; ?></h2>
                    <p><?php echo $product['price']; ?>€</p>
                    <a href="detail.php?id=<?php echo $product['id']; ?>">Voir les détails</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>