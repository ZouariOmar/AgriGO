<?php

include "../Controller/partnerController.php";
$partnerC = new partnerController();

// Gérer les résultats de recherche ou afficher la liste complète
$partners = isset($_GET['search']) && !empty($_GET['search'])
    ? $partnerC->searchPartner($_GET['search'])
    : $partnerC->partnerList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Partner List</title>
</head>

<body>
    <h1>Partner Management</h1>

    <!-- Formulaire de recherche -->
    <form method="get" action="">
        <input type="text" name="search" placeholder="Search partners..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" required>
        <button type="submit">Search</button>
        <a href="partnerList.php">Clear Search</a>
    </form>

    <!-- Tableau des résultats -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
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
                        <td>
                            <!-- Boutons Update et Delete -->
                            <form method="POST" action="updatepartner.php" style="display:inline;">
                                <input type="hidden" value="<?= $partner['id_partner'] ?>" name="id_partner">
                                <button type="submit" name="update">Update</button>
                            </form>
                            <a href="deletepartner.php?id_partner=<?= $partner['id_partner'] ?>" onclick="return confirm('Are you sure you want to delete this partner?')">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5">No results found</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Bouton pour ajouter un partenaire -->
    <a href="addpartner.php">Add New Partner</a>

    <script src="../public/js/script.js"></script>
</body>

</html>
