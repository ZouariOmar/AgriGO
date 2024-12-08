<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once '../config/database.php';

// Check if the product ID is provided
if (!isset($_GET['id'])) {
    echo "Product ID is missing.";
    exit();
}

$product_id = $_GET['id'];

// Fetch the product details from the database
$query = "SELECT * FROM produit WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// If the product doesn't exist, show an error
if (!$product) {
    echo "Product not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $id_categorie = $_POST['id_categorie'];
    $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $product['image']; // Use the current image if no new one is uploaded

    // Upload the image file if a new one is selected
    if ($_FILES['image']['name']) {
        $target_dir = "../upload/produit/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }

    // Update the product in the database
    $query = "UPDATE produit SET libelle = :libelle, prix = :prix, id_categorie = :id_categorie, image = :image WHERE id = :id";
    $stmt = $pdo->prepare($query);
    
    // Bind parameters
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $product_id);
    
    if ($stmt->execute()) {
        // Redirect to the product list page after successful update
        header("Location: ../index.php"); // Ensure index.php is where the product list is displayed
        exit();
    } else {
        echo "Error: Unable to update product.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Modify Product</title>
</head>
<body>
    <?php include '../include/nav.php' ?>
    
    <div class="container py-2">
        <h2>Modify Product</h2>

        <form action="modifier_produit.php?id=<?= $product_id ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="libelle" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?= htmlspecialchars($product['libelle']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Price</label>
                <input type="number" class="form-control" id="prix" name="prix" value="<?= htmlspecialchars($product['prix']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_categorie" class="form-label">Category</label>
                <select class="form-control" id="id_categorie" name="id_categorie" required>
                    <?php
                    // Fetch categories for the dropdown
                    $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($categories as $category):
                    ?>
                        <option value="<?= $category->id ?>" <?= $category->id == $product['id_categorie'] ? 'selected' : '' ?>>
                            <?= $category->libelle ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <small>Current image: <?= $product['image'] ?></small>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>
