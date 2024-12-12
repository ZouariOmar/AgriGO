<?php
require_once '../include/database.php';
require_once '../controllers/CommandeController.php';

// Instantiate controller
$controller = new CommandeController($pdo);

// Get all commandes
$commandes = $controller->listCommandes();
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php'; ?>
    <title>Liste des Commandes</title>
</head>
<body>
<?php include '../include/nav.php'; ?>
<div class="container py-2">
    <h2>Liste des Commandes</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>REF</th>
            <th>Client</th>
            <th>Total</th>
            <th>Date</th>
            <th>Opérations</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($commandes as $commande): ?>
            <tr>
                <td><?= $commande['id']; ?></td>
                <td><?= $commande['login']; ?></td>
                <td><?= $commande['total']; ?> <i class="fa fa-solid fa-dollar"></i></td>
                <td><?= $commande['date_creation']; ?></td>
                <td><a class="btn btn-primary btn-sm" href="commande.php?id=<?= $commande['id']; ?>">Afficher détails</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
