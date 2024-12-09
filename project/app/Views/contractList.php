<?php
include "../Model/contract.php";
include "../Controller/contractController.php";

// Initialisation du contrôleur des contrats
$contractController = new contractController();

// Définir les valeurs par défaut pour la pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Nombre d'éléments par page

// Récupérer les contrats avec le filtrage par date_fin
$dateFinFilter = isset($_GET['date_fin']) ? $_GET['date_fin'] : '';

// Récupérer la liste des contrats avec pagination et filtrage
$contracts = $contractController->contractList($page, $limit, $dateFinFilter);

// Calculer le nombre total de contrats pour la pagination
$totalContracts = $contractController->getTotalContracts($dateFinFilter);

// Calculer le nombre total de pages
$totalPages = ceil($totalContracts / $limit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract.css">
    <title>Contrats List</title>
</head>
<body>

    <h1>Contract Management</h1>
    <div style="text-align: right; margin: 10px;">
        <button id="theme-toggle">Switch to Dark Mode</button>
    </div>

    <!-- Filtrer les contrats par date de fin -->
    <form method="get" action="contractList.php">
        
        <input type="date" id="date_fin" name="date_fin" value="<?= htmlspecialchars($dateFinFilter) ?>">
        <button type="submit">Filter</button>
        <a href="contractList.php">Clear Filter</a>
    </form>

    <!-- Afficher la liste des contrats -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de création contract</th>
                <th>Date de fin contract</th>
                <th>Partenaire_ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contracts as $contract): ?>
                <tr>
                    <td><?= htmlspecialchars($contract['id']) ?></td>
                    <td><?= htmlspecialchars($contract['titre']) ?></td>
                    <td><?= htmlspecialchars($contract['description']) ?></td>
                    <td><?= htmlspecialchars($contract['date_creation']) ?></td>
                    <td><?= htmlspecialchars($contract['date_fin']) ?></td>
                    <td><?= htmlspecialchars($contract['partner_id']) ?></td>
                    <td>
                            <!-- Boutons Update et Delete -->
                            <form method="POST" action="updatecontract.php" style="display:inline;">
                                <input type="hidden" value="<?= $contract['id'] ?>" name="id">
                                <button type="submit" name="update">Update</button>
                            </form>
                            <a href="deletecontract.php?id=<?= $contract['id'] ?>">Delete</a>
                        </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="contractList.php?page=<?= $page - 1 ?>&date_fin=<?= htmlspecialchars($dateFinFilter) ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="contractList.php?page=<?= $i ?>&date_fin=<?= htmlspecialchars($dateFinFilter) ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="contractList.php?page=<?= $page + 1 ?>&date_fin=<?= htmlspecialchars($dateFinFilter) ?>">Next</a>
        <?php endif; ?>
    </div>
    <!-- Bouton pour ajouter un contract -->
    <a href="addcontract.php">Add New Contract</a>

    <script src="../public/js/scriptcontract.js"></script>

</body>
</html>
