<?php
require_once '../models/CategoryModel.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        // Initialize CategoryModel instance
        $this->categoryModel = new CategoryModel();
    }

    // Add category
    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
            // Get POST data
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            // Validate required fields
            if (!empty($libelle) && !empty($description)) {
                // Call the model to add the category
                $success = $this->categoryModel->addCategory($libelle, $description, $icone);
                if ($success) {
                    header('Location: ../views/categories.php');  // Redirect to category list
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Database error (40023).</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Libelle and description are required.</div>";
            }
        }
    }

    // Get all categories
    public function getAllCategories() {
        return $this->categoryModel->getAllCategories(); // Call model to fetch all categories
    }

    // Delete category
    public function deleteCategory() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->categoryModel->deleteCategory($id);
            header('Location: ../views/categories.php');  // Redirect to category list
            exit();
        }
    }

    // Update category
    public function updateCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
            // Get POST data
            $id = $_POST['id'];
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            // Call model method to update category
            $success = $this->categoryModel->updateCategory($id, $libelle, $description, $icone);
            if ($success) {
                header('Location: ../views/categories.php');  // Redirect to category list
                exit();
            } else {
                echo "<div class='alert alert-danger'>Database error (40023).</div>";
            }
        }
    }
}
?>
