<?php
include_once 'model.php';
$products = getAll();

include("header.php");
?>

    <h1 class="h1">Mes annonces</h1>
    
    <div>
        <?php foreach ($products as $product): ?>
            <div  class="div1" style="display:inline-block;width: 350px">
                <img src="images/<?php echo ($product['image']); ?>" alt="<?php echo ($product['name']); ?>" style="width: 144px;height: 164px;">
                <h2><?php echo $product['name']; ?></h2>
                <p>Prix: <?php echo ($product['price']); ?>€</p>
                <p>Description: <?php echo ($product['description']); ?></p>
                <p>Ville: <?php echo ($product['city']); ?></p>
                <p>Catégorie: <?php echo ($product['categorie']); ?></p>
                <p>Livraison: <?php echo $product['shipping'] ? 'Oui' : 'Non'; ?></p>
                <a href="modifier_produit.php?id=<?php echo $product['name']; ?>">Modifier</a>
                <a href="controleur.php?action=delet_product&id=<?php echo $product['id']; ?>">Supprimer</a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>