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
    <title>Modifier le Produit</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Modifier le Produit</h1>
    <form action="modifier_produit.php?id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
        <label for="name">Nom du produit:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br>
        
        <label for="price">Prix:</label>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br>
        
        <label for="shipping">Livraison:</label>
        <select id="shipping" name="shipping">
            <option value="yes" <?php if ($product['shipping']) echo 'selected'; ?>>Oui</option>
            <option value="no" <?php if (!$product['shipping']) echo 'selected'; ?>>Non</option>
        </select><br>
        
        <label for="categorie">Catégorie:</label>
        <input type="text" id="categorie" name="categorie" value="<?php echo htmlspecialchars($product['categorie']); ?>" required><br>
        
        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" value="<?php echo htmlspecialchars($product['city']); ?>" required><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br>
        <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($product['image']); ?>">
        
        <button type="submit">Modifier</button>
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET["id"];
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
    } else {
        $image = $_POST["existing_image"];
    }

    $categorie = $_POST["categorie"];
    $city = $_POST["ville"];
    editer($id, $name, $price, $description, $shipping, $image, $categorie, $city);
    header("Location: index.php");
    exit();
}
?>