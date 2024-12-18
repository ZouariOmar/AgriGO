<?php
require_once '../Models/ProductModel.php';

class ProductController
{
    private $productModel;
    private $pdo;

    public function __construct()
    {
        // Initialize ProductModel instance
        $this->productModel = new ProductModel();
        $this->pdo = new PDO('mysql:host=localhost;dbname=SDD', 'zouari_omar', 'root');
    }

    // Add product
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
            // Get POST data and sanitize inputs
            $libelle = htmlspecialchars($_POST['libelle']);
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            $description = htmlspecialchars($_POST['description']);

            // Handle image upload
            $filename = 'produit.png'; // Default image name
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $filename = uniqid() . $image;  // Unique image name
                // Validate image upload
                if (move_uploaded_file($_FILES['image']['tmp_name'], '../upload/produit/' . $filename)) {
                    // Image uploaded successfully
                } else {
                    echo "<div class='alert alert-danger'>Image upload failed.</div>";
                    return;
                }
            }

            // Validate required fields
            if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
                $success = $this->productModel->addProduct($libelle, $prix, $categorie, $description, $filename);
                if ($success) {
                    header('Location: ../Views/produits.php');  // Redirect to product list
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
    public function getAllProducts()
    {
        return $this->productModel->getAllProducts(); // Call model to fetch all products
    }

    // Get product by ID
    public function getProductById($productId)
    {
        return $this->productModel->getProductById($productId); // Call model to fetch product by ID
    }

    // Delete product
    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->productModel->deleteProduct($id);
            header('Location: ../index.php');  // Redirect to product list
            exit();
        }
    }

    // Update product
    public function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
            // Get POST data and sanitize inputs
            $id = $_POST['id'];
            $libelle = htmlspecialchars($_POST['libelle']);
            $prix = $_POST['prix'];
            $discount = $_POST['discount'];  // Assuming you have a discount field
            $categorie = $_POST['categorie'];
            $description = htmlspecialchars($_POST['description']);

            // Handle image upload
            $filename = '';  // Default: no new image
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $filename = uniqid() . $image;  // Unique image name
                // Validate image upload
                if (move_uploaded_file($_FILES['image']['tmp_name'], '../upload/produit/' . $filename)) {
                    // Image uploaded successfully
                } else {
                    echo "<div class='alert alert-danger'>Image upload failed.</div>";
                    return;
                }
            }

            // Call model method to update product
            $success = $this->productModel->updateProduct($id, $libelle, $prix, $discount, $categorie, $description, $filename);
            if ($success) {
                header('Location: ../Views/produits.php');  // Redirect to product list
                exit();
            } else {
                echo "<div class='alert alert-danger'>Database error (40023).</div>";
            }
        }
    }

    public function getProductsForPage($offset, $productsPerPage)
    {
        try {
            // Prepare the SQL query
            $sql = "SELECT * FROM products LIMIT :offset, :productsPerPage";
            $stmt = $this->pdo->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':productsPerPage', $productsPerPage, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch the results as an array of objects
            $products = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $products;
        } catch (PDOException $e) {
            throw new Exception("Error fetching products: " . $e->getMessage());
        }
    }

    public function getProductsPaginated($page = 1, $perPage = 9)
    {
        return $this->productModel->getProductsPaginated($page, $perPage);
    }

    public function getTotalProducts()
    {
        return $this->productModel->getTotalProducts();
    }
}
?>