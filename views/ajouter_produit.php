<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $id_categorie = $_POST['id_categorie'];
    $image = $_FILES['image']['name'];
    
    // Upload the image file
    $target_dir = "../upload/produit/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert the product into the database
    $query = "INSERT INTO produit (libelle, prix, id_categorie, image) VALUES (:libelle, :prix, :id_categorie, :image)";
    $stmt = $pdo->prepare($query);
    
    // Bind parameters
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->bindParam(':image', $image);
    
    if ($stmt->execute()) {
        // Redirect back to the product list
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: Unable to add product.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Add Product</title>
</head>
<body>
    <?php include '../include/nav.php' ?>
    
    <div class="container py-2">
        <h2>Add Product</h2>

        <form action="ajouter_produit.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="libelle" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Price</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>

            <div class="mb-3">
                <label for="id_categorie" class="form-label">Category</label>
                <select class="form-control" id="id_categorie" name="id_categorie" required>
                    <?php
                    // Fetch categories for the dropdown
                    $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($categories as $category):
                    ?>
                        <option value="<?= $category->id ?>"><?= $category->libelle ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

   
</body>
</html>
