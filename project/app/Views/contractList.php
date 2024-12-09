<?php
include "../Controller/contractController.php";
$contractC = new contractController();

// Nombre de résultats par page
$resultsPerPage = 5;

// Page actuelle
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Récupération des filtres
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

// Calcul du point de départ de la pagination
$startFrom = ($currentPage - 1) * $resultsPerPage;

// Récupérer la liste des contrats avec pagination et filtrage par date_fin
$contracts = $contractC->contractList($currentPage, $resultsPerPage, $statusFilter);

// Récupérer les informations de pagination
$totalContracts = $contractC->getTotalcontracts($statusFilter);
$totalPages = ceil($totalContracts / $resultsPerPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract-1.css">
    <title>Contract List</title>
</head>

<body>
    <div class="container">
        <h1>Contract Management</h1>

        <!-- Bouton pour le mode sombre -->
        <div style="text-align: right; margin: 10px;">
            <button id="theme-toggle">Switch to Dark Mode</button>
        </div>

        <!-- Formulaire de recherche et filtrage par date_fin -->
        <div class="filter-container">
            <form method="get" action="">
                <input type="text" name="search" placeholder="Search contracts..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" required>
                <button type="submit">Search</button>
                <a href="contractList.php">Clear Search</a>
            </form>

            <form method="get" action="">
                <!-- Formulaire de filtre par date -->
<div class="filter-date">
    <input type="date" id="filter-date-end" name="date-end" placeholder="Filter by Date Fin">
    <button id="filter-button">Filter</button>
    <button class="clear-filter" id="clear-filter-button">Clear Filter</button>
</div>

            </form>
        </div>

        <!-- Tableau des résultats -->
        <table class="contracts-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contract Title</th>
                    <th>Description</th>
                    <th>Date Creation</th>
                    <th>Date Fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contracts)) {
                    foreach ($contracts as $contract) { ?>
                        <tr>
                            <td><?= htmlspecialchars($contract['id']) ?></td>
                            <td><?= htmlspecialchars($contract['titre']) ?></td>
                            <td><?= htmlspecialchars($contract['description']) ?></td>
                            <td><?= htmlspecialchars($contract['date_creation']) ?></td>
                            <td><?= htmlspecialchars($contract['date_fin']) ?></td>
                            <td class="actions">
                                <form method="POST" action="updatecontract.php" style="display:inline;">
                                    <input type="hidden" value="<?= $contract['id'] ?>" name="id">
                                    <button type="submit" name="update">Update</button>
                                </form>
                                <a href="deletecontract.php?id=<?= $contract['id'] ?>" onclick="return confirm('Are you sure you want to delete this contract?')">Delete</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No results found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php if ($currentPage > 1) { ?>
                <a href="?page=<?= $currentPage - 1 ?>&search=<?= htmlspecialchars($searchTerm) ?>&status=<?= htmlspecialchars($statusFilter) ?>">Previous</a>
            <?php }
            for ($i = 1; $i <= $totalPages; $i++) { ?>
                <a href="?page=<?= $i ?>&search=<?= htmlspecialchars($searchTerm) ?>&status=<?= htmlspecialchars($statusFilter) ?>" class="<?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
            <?php }
            if ($currentPage < $totalPages) { ?>
                <a href="?page=<?= $currentPage + 1 ?>&search=<?= htmlspecialchars($searchTerm) ?>&status=<?= htmlspecialchars($statusFilter) ?>">Next</a>
            <?php } ?>
        </div>

        <!-- Bouton pour ajouter un contract -->
        <a href="addcontract.php" class="btn btn-add">Add New Contract</a>
    </div>

    <script src="../public/js/scriptcontract-1.js"></script>
</body>

</html>
