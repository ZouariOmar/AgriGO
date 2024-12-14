<?php
include "../Controllers/contractController.php";
$contractC = new contractController();

// Nombre de résultats par page
$resultsPerPage = 5;

// Page actuelle
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Récupération du filtre par date_fin
$endDateFilter = isset($_GET['date_fin']) ? $_GET['date_fin'] : '';

// Calcul du point de départ de la pagination
$startFrom = ($currentPage - 1) * $resultsPerPage;

// Récupérer la liste des contrats avec pagination et filtrage par date_fin
$contracts = $contractC->contractListWithPagination($startFrom, $resultsPerPage, $endDateFilter);

// Récupérer les informations de pagination
$paginationInfo = $contractC->getPaginationInfo($currentPage, $resultsPerPage, $endDateFilter);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract.css">
    <title>Contract List</title>
</head>

<body>
    <h1>Contract Management</h1>

    <!-- Filtrage par date_fin -->
    <form method="get" action="">
        <label for="date_fin">Filter by End Date:</label>
        <input type="date" name="date_fin" value="<?= htmlspecialchars($endDateFilter) ?>">
        <button type="submit">Filter</button>
        <a href="contractList.php">Clear Filter</a>
    </form>

    <!-- Tableau des résultats -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
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
                        <td>
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
                    <td colspan="7">No results found</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($paginationInfo['prevPage'] < $currentPage) { ?>
            <a href="?page=<?= $paginationInfo['prevPage'] ?>&date_fin=<?= $endDateFilter ?>">Previous</a>
        <?php } ?>
        
        <?php for ($i = 1; $i <= $paginationInfo['totalPages']; $i++) { ?>
            <a href="?page=<?= $i ?>&date_fin=<?= $endDateFilter ?>" class="<?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
        <?php } ?>

        <?php if ($paginationInfo['nextPage'] > $currentPage) { ?>
            <a href="?page=<?= $paginationInfo['nextPage'] ?>&date_fin=<?= $endDateFilter ?>">Next</a>
        <?php } ?>
    </div>

    <!-- Bouton pour ajouter un contrat -->
    <a href="addcontract.php">Add New Contract</a>

    <script src="../public/js/scriptcontract.js"></script>
</body>

</html>
