<?php
include_once 'model.php';
$products = getAllProducts();

include("header.php");
?>

    <h1 class="h1">Bienvenue sur notre site E-commerce</h1>
    
    <div>
        <?php foreach ($products as $product): ?>
            <div  class="div1" style="display:inline-block;">
            <a href="detail.php?id=<?php echo $product['id']; ?>"><img src="images/<?php echo $product['image']; ?>" alt="<?php echo ($product['name']); ?>" style="width: 140px;height: 164px;"></a>
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['price']; ?>€</p>
                <a href="detail.php?id=<?php echo $product['id']; ?>">Voir les détails</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php include("footer.php"); ?>
</body>
</html>