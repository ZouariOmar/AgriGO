<?php
// Include database connection
require_once 'config/database.php';

// Query the products from the database
$query = "SELECT produit.*, categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id";
$products = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Product List</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
    
    <div class="container py-2">
        <h2>Product List</h2>
        
        <a href="views/ajouter_produit.php" class="btn btn-primary">Add Product</a>
        
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Creation Date</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= $product->libelle ?></td>
                        <td><?= $product->prix ?> <i class="fa fa-solid fa-dollar"></i></td>
                        <td><?= $product->categorie_libelle ?></td>
                        <td><?= $product->date_creation ?></td>
                        <td><img class="img-fluid" width="90" src="upload/produit/<?= $product->image ?>" alt="<?= $product->libelle ?>"></td>
                        <td>
                            <a class="btn btn-primary" href="views/modifier_produit.php?id=<?= $product->id ?>">Edit</a>
                            <a class="btn btn-danger" href="views/supprimer_produit.php?id=<?= $product->id ?>" onclick="return confirm('Are you sure you want to delete the product <?= $product->libelle ?>?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
</body>
</html>
