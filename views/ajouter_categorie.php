<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $icone = $_POST['icone'];

    // Insert the category into the database
    $query = "INSERT INTO categorie (libelle, description, icone) VALUES (:libelle, :description, :icone)";
    $stmt = $pdo->prepare($query);
    
    // Bind parameters
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':icone', $icone);
    
    if ($stmt->execute()) {
        // Redirect back to the categories list
        header("Location: ../views/categories.php");
        exit();
    } else {
        echo "Error: Unable to add category.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Add Category</title>
</head>
<body>
    <?php include '../include/nav.php' ?>
    
    <div class="container py-2">
        <h2>Add Category</h2>

        <form action="ajouter_categorie.php" method="post">
            <div class="mb-3">
                <label for="libelle" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="icone" class="form-label">Icon</label>
                <input type="text" class="form-control" id="icone" name="icone" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>

</body>
</html>
