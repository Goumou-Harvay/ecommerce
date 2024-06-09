<?php
include_once 'controleur.php';
$products = getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Mon Site E-commerce</title>
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
            color: #333;
        }

        a {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .product-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .product-item {
            width: 300px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-item img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .product-item h2 {
            color: #333;
        }

        .product-item p {
            color: #777;
        }

        .product-item a {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .product-item a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bienvenue sur notre site E-commerce</h1>
    <a href="ajouter_produit.php">Ajouter un produit</a>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo htmlspecialchars($product['price']); ?>€</p>
                <a href="detail.php?id=<?php echo $product['id']; ?>">Voir les détails</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
