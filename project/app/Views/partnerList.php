<?php
include "../Controller/partnerController.php";
$partnerC = new partnerController();

// Nombre de résultats par page
$resultsPerPage = 5;

// Page actuelle
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Récupération des filtres
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

// Calcul du point de départ de la pagination
$startFrom = ($currentPage - 1) * $resultsPerPage;

// Récupérer la liste des partenaires avec pagination et filtrage par statut
$partners = $partnerC->partnerListWithPagination($startFrom, $resultsPerPage, $searchTerm, $statusFilter);

// Récupérer les informations de pagination
$paginationInfo = $partnerC->getPaginationInfo($currentPage, $resultsPerPage, $searchTerm, $statusFilter);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylepartner.css">
    <title>Partners List</title>
</head>

<body>
    <h1>Partner Management</h1>
    <div style="text-align: right; margin: 10px;">
        <button id="theme-toggle">Switch to Dark Mode</button>
    </div>

    <!-- Formulaire de recherche par nom, email, ou numéro -->
    <form method="get" action="">
        <input type="text" name="search" placeholder="Search partners..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" required>
        <button type="submit">Search</button>
        <a href="partnerList.php">Clear Search</a>
    </form>

    <!-- Formulaire de filtrage par statut -->
    <form method="get" action="">
        <select name="status">
            <option value="">All Statuses</option>
            <option value="active" <?= ($statusFilter == 'active') ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= ($statusFilter == 'inactive') ? 'selected' : '' ?>>Inactive</option>
        </select>
        <button type="submit">Filter</button>
        <a href="partnerList.php">Clear Filter</a>
    </form>

    <!-- Tableau des résultats -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($partners)) {
                foreach ($partners as $partner) { ?>
                    <tr>
                        <td><?= htmlspecialchars($partner['id_partner']) ?></td>
                        <td><?= htmlspecialchars($partner['name']) ?></td>
                        <td><?= htmlspecialchars($partner['email']) ?></td>
                        <td><?= htmlspecialchars($partner['number']) ?></td>
                        <td><?= htmlspecialchars($partner['status']) ?></td>
                        <td>
                            <!-- Boutons Update et Delete -->
                            <form method="POST" action="updatepartner.php" style="display:inline;">
                                <input type="hidden" value="<?= $partner['id_partner'] ?>" name="id_partner">
                                <button type="submit" name="update">Update</button>
                            </form>
                            <a href="deletepartner.php?id_partner=<?= $partner['id_partner'] ?>">Delete</a>
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
        <?php if ($paginationInfo['prevPage'] < $currentPage) { ?>
            <a href="?page=<?= $paginationInfo['prevPage'] ?>&search=<?= $searchTerm ?>&status=<?= $statusFilter ?>">Previous</a>
        <?php } ?>
        
        <?php for ($i = 1; $i <= $paginationInfo['totalPages']; $i++) { ?>
            <a href="?page=<?= $i ?>&search=<?= $searchTerm ?>&status=<?= $statusFilter ?>" class="<?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
        <?php } ?>

        <?php if ($paginationInfo['nextPage'] > $currentPage) { ?>
            <a href="?page=<?= $paginationInfo['nextPage'] ?>&search=<?= $searchTerm ?>&status=<?= $statusFilter ?>">Next</a>
        <?php } ?>
    </div>

    <!-- Bouton pour ajouter un partenaire -->
    <a href="addpartner.php">Add New Partner</a>

    <script src="../public/js/scriptpartner.js"></script>
</body>

</html>
