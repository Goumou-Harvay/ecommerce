<?php
    session_start();
    include_once 'model.php';

    function ajouter_produit(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $contact = $_POST["contact"];
            $id = $_SESSION["id"];
            $shipping = ($_POST["shipping"] == "yes") ? true : false;

            $dossier = "images/";
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = basename($_FILES['image']['name']);
            $uploadPath = $dossier . $imageName;

            if (is_uploaded_file($imageTmpPath) && move_uploaded_file($imageTmpPath, $uploadPath)) {
                $image = $imageName;
                $categorie = $_POST["categorie"];
                $city = $_POST["ville"];
                ajouter($name, $price, $description, $shipping, $image, $categorie, $city, $contact,$id);
                header("Location: index.php");
                exit();
            } else {
                echo "Échec de l'upload de l'image.";
            }
        }
    }

    function delet_product(){
        if (isset($_GET['id'])) {
            delete_produit($_GET['id']);
            header('Location: index.php');
            exit();
        } else {
            echo "ID du produit non spécifié.";
        }
    }

    function edit_product(){
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
    }

    function auth(){
        $nom = $_POST["nom"];
        $pass = $_POST["password"];
        
        $authentified = checkAuth($pass,$nom);
        
        if(  $authentified == False){
            header('Location: login.php?message=0');
            exit;
        }
    
        session_start();
        $_SESSION["auth"] = True;
        $_SESSION["id"] =  $authentified;	

        header('Location: index.php');
        exit;
    }
    
    function destroye(){
        session_start();
        session_destroy();
        Header('location:index.php');
        exit;
    }

    function ajout(){
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        ajouter_user($nom,$email,$password);
        Header("location:login.php");
        
       }

$action = $_GET["action"];
$action();

?>