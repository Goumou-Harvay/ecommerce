<?php
include_once 'controleur.php';
if (isset($_GET['id'])) {
    delete_produit($_GET['id']);
    header('Location: index.php');
    exit();
} else {
    echo "ID du produit non spécifié.";
}
?>