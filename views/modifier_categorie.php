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
} else {
    echo "Invalid category ID!";
    exit();
}

// Handle form submission to update category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $icone = $_POST['icone'];

    // Update category in the database
    $updateQuery = "UPDATE categorie SET libelle = :libelle, description = :description, icone = :icone WHERE id = :id";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':libelle', $libelle);
    $updateStmt->bindParam(':description', $description);
    $updateStmt->bindParam(':icone', $icone);
    $updateStmt->bindParam(':id', $id);

    if ($updateStmt->execute()) {
        // Redirect to category list page after successful update
        header("Location: categories.php");
        exit();
    } else {
        echo "Error updating category!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Modifier catégorie</title>
</head>
<body>
<?php include '../include/nav.php' ?>
<div class="container py-2">
    <h4>Modifier catégorie</h4>
    <form method="post">
        <input type="hidden" class="form-control" name="id" value="<?= $category['id'] ?>">

        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="<?= $category['libelle'] ?>" required>

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" required><?= $category['description'] ?></textarea>

        <label class="form-label">Icône</label>
        <input type="text" class="form-control" name="icone" value="<?= $category['icone'] ?>" required>

        <input type="submit" value="Modifier catégorie" class="btn btn-primary my-2" name="modifier">
    </form>
</div>
</body>
</html>
