<?php
include_once 'model.php';

function ajouter($name, $price, $description, $shipping, $image, $categorie, $city) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('INSERT INTO products (name, price, description, shipping, image, categorie, city) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $price, $description, $shipping, $image, $categorie, $city]);
}

function editer($id, $name, $price, $description, $shipping, $image, $categorie, $city) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('UPDATE products SET name = ?, price = ?, description = ?, shipping = ?, image = ?, categorie = ?, city = ? WHERE id = ?');
    $stmt->execute([$name, $price, $description, $shipping, $image, $categorie, $city, $id]);
}

function delete_produit($id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
    $stmt->execute([$id]);
}

function getProduct($id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getAllProducts() {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT * FROM products');
    return $stmt->fetchAll();
}
?>