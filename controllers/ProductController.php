<?php
require_once '../models/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        // Initialize ProductModel instance
        $this->productModel = new ProductModel();
    }

    // Add product
    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
            // Get POST data
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            $description = $_POST['description'];

            // Handle image upload
            $filename = 'produit.png'; // Default image name
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $filename = uniqid() . $image;  // Unique image name
                move_uploaded_file($_FILES['image']['tmp_name'], '../upload/produit/' . $filename);  // Save uploaded image
            }

            // Validate required fields
            if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
                $success = $this->productModel->addProduct($libelle, $prix, $categorie, $description, $filename);
                if ($success) {
                    header('Location: ../views/produits.php');  // Redirect to product list
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Database error (40023).</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Libelle, prix, catégorie sont obligatoires.</div>";
            }
        }
    }

    // Get all products
    public function getAllProducts() {
        return $this->productModel->getAllProducts(); // Call model to fetch all products
    }

    // Delete product
    public function deleteProduct() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->productModel->deleteProduct($id);
            header('Location: ../index.php');  // Redirect to product list
            exit();
        }
    }

    // Update product
    public function updateProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
            // Get POST data
            $id = $_POST['id'];
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $discount = $_POST['discount'];  // Assuming you have a discount field
            $categorie = $_POST['categorie'];
            $description = $_POST['description'];

            // Handle image upload
            $filename = '';  // Default: no new image
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $filename = uniqid() . $image;  // Unique image name
                move_uploaded_file($_FILES['image']['tmp_name'], '../upload/produit/' . $filename);  // Save uploaded image
            }

            // Call model method to update product
            $success = $this->productModel->updateProduct($id, $libelle, $prix, $discount, $categorie, $description, $filename);
            if ($success) {
                header('Location: ../views/produits.php');  // Redirect to product list
                exit();
            } else {
                echo "<div class='alert alert-danger'>Database error (40023).</div>";
            }
        }
    }
}
?>
