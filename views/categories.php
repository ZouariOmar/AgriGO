<?php
// Include database connection
require_once '../config/database.php';

// Query the categories from the database
$query = "SELECT * FROM categorie";
$categories = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Liste des catégories</title>
</head>
<body>
    <?php include '../include/nav.php' ?>

    <div class="container py-2">
        <h2>Liste des catégories</h2>
        <a href="ajouter_categorie.php" class="btn btn-primary">Ajouter catégorie</a>

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Icone</th>
                    <th>Date de création</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($categories) && !empty($categories)): ?>
                    <?php foreach ($categories as $categorie): ?>
                        <tr>
                            <td><?= $categorie['id'] ?></td>
                            <td><?= $categorie['libelle'] ?></td>
                            <td><?= $categorie['description'] ?></td>
                            <td><i class="fa <?= $categorie['icone'] ?>"></i></td>
                            <td><?= $categorie['date_creation'] ?></td>
                            <td>
                                <a href="modifier_categorie.php?id=<?= $categorie['id'] ?>" class="btn btn-primary">Modifier</a>
                                <a href="supprimer_categorie.php?id=<?= $categorie['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer la catégorie <?= $categorie['libelle'] ?>?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucune catégorie trouvée</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
