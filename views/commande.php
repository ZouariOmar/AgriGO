<?php
require_once '../include/database.php';
require_once '../controllers/CommandeController.php';

// Get the ID from the query string
$idCommande = isset($_GET['id']) ? $_GET['id'] : null;

if (!$idCommande) {
    die("Error: Commande ID not specified.");
}

// Instantiate controller
$controller = new CommandeController($pdo);

// Fetch the specific commande details
$commande = $controller->showCommandeDetails($idCommande);

// Fetch ligne_commande details
$sqlStateLigneCommandes = $pdo->prepare('SELECT ligne_commande.*, produit.libelle, produit.image 
                                         FROM ligne_commande
                                         INNER JOIN produit ON ligne_commande.id_produit = produit.id
                                         WHERE id_commande = ?');
$sqlStateLigneCommandes->execute([$idCommande]);
$lignesCommandes = $sqlStateLigneCommandes->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php'; ?>
    <title>Commande | Numéro <?= htmlspecialchars($commande['id']); ?> </title>
</head>
<body>
<?php include '../include/nav.php'; ?>
<div class="container py-2">
    <h2>Détails Commandes</h2>
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
        <tr>
            <td><?= htmlspecialchars($commande['id']); ?></td>
            <td><?= htmlspecialchars($commande['login']); ?></td>
            <td><?= htmlspecialchars($commande['total']); ?> <i class="fa fa-solid fa-dollar"></i></td>
            <td><?= htmlspecialchars($commande['date_creation']); ?></td>
            <td>
                <?php if ($commande['valide'] == 0): ?>
                    <a class="btn btn-success btn-sm" href="valider_commande.php?id=<?= $commande['id']; ?>&etat=1">Valider la commande</a>
                <?php else: ?>
                    <a class="btn btn-danger btn-sm" href="valider_commande.php?id=<?= $commande['id']; ?>&etat=0">Annuler la commande</a>
                <?php endif; ?>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <h2>Produits : </h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($lignesCommandes as $ligne): ?>
            <tr>
                <td><?= htmlspecialchars($ligne->id); ?></td>
                <td><?= htmlspecialchars($ligne->libelle); ?></td>
                <td><?= htmlspecialchars($ligne->prix); ?> <i class="fa fa-solid fa-dollar"></i></td>
                <td>x <?= htmlspecialchars($ligne->quantite); ?></td>
                <td><?= htmlspecialchars($ligne->total); ?> <i class="fa fa-solid fa-dollar"></i></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
