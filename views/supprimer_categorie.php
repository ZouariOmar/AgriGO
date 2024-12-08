<?php
// Include database connection
require_once '../config/database.php';

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the category data from the database
    $query = "SELECT * FROM categorie WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Check if category was found
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    // If no category is found, redirect or display an error
    if (!$category) {
        echo "Category not found!";
        exit();
    }

    // Handle category deletion
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supprimer'])) {
        // Delete the category from the database
        $deleteQuery = "DELETE FROM categorie WHERE id = :id";
        $deleteStmt = $pdo->prepare($deleteQuery);
        $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($deleteStmt->execute()) {
            // Redirect to category list page after successful deletion
            header("Location: categories.php");
            exit();
        } else {
            echo "Error deleting category!";
        }
    }
} else {
    echo "Invalid category ID!";
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Supprimer catégorie</title>
</head>
<body>
<?php include '../include/nav.php' ?>
<div class="container py-2">
    <h4>Supprimer catégorie</h4>
    <p>Êtes-vous sûr de vouloir supprimer la catégorie <strong><?= $category['libelle'] ?></strong> ?</p>
    <form method="post">
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
        <a href="categories.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>
