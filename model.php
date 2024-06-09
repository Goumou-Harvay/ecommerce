<?php
function getDbConnection() {
    $host = 'localhost';
    $db = 'id21793888_ecommerce';
    $user = 'id21793888_goumou';
    $pass = 'Hervas2040.';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}


//include_once 'model.php';

function ajouter($name, $price, $description, $shipping, $image, $categorie, $city, $contact, $id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('INSERT INTO products (name, price, description, shipping, image, categorie, city, contact,iduser) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $price, $description, $shipping, $image, $categorie, $city, $contact, $id]);
}

function ajouter_user($name, $email, $password) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('INSERT INTO user (nom, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$name, $email, $password]);
}

function editer($id, $name, $price, $description, $shipping, $image, $categorie, $city) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('UPDATE products SET name = ?, price = ?, description = ?, shipping = ?, image = ?, categorie = ?, city = ? WHERE id = ?');
    $stmt->execute([$name, $email, $password]);
}

function delete_produit($id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
    $stmt->execute([$id]);
}

function getProduct($id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT * FROM products WHERE name = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getcate($id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT * FROM products WHERE categorie = ?');
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}

function getAllProducts() {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT * FROM products');
    return $stmt->fetchAll();
}

function getAll() {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT * FROM products INNER JOIN user ON products.iduser = user.id');
    return $stmt->fetchAll();
}


function checkAuth($pass,$nom){
	$pdo = getDbConnection();
    $stmt = $pdo->prepare("SELECT * FROM user where nom=? and password= ?");
	$stmt->execute([$nom,$pass]);
	
	$res = $stmt->rowCount();
	
	if($res >= 1){
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		return $data["id"];
	}
	else{
		return False;
	}
	
}
?>

