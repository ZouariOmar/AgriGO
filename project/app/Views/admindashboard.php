<?php
include "../Controller/partnerController.php";
include "../Controller/contractController.php";

$partnerController = new partnerController();
$contractController = new contractController();

// Récupérer la liste des partenaires et des contrats
$partners = $partnerController->partnerList();
$contracts = $contractController->contractList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/styleAdmin.css">
</head>
<body>
<header>
    <div class="header-content">
        <img src="../public/images/apple-touch-icon.png" alt="Logo" class="logo">
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="partnerList.php">Partners</a>
            <a href="contractList.php">Contracts</a>
            <a href="logout.php">Logout</a>
        </nav>
        <div style="text-align: right; margin: 10px;">
        <button id="theme-toggle">Switch to Dark Mode</button>
    </div>
    </div>
</header>

    <div class="container">
        <section>
            <h2>Manage Partners</h2>
            <a href="addPartner.php" class="btn">Add New Partner</a>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($partners as $partner): ?>
                        <tr>
                            <td><?php echo $partner['name']; ?></td>
                            <td><?php echo $partner['email']; ?></td>
                            <td><?php echo $partner['status']; ?></td>
                            <td>
                                <a href="updatepartner.php?id_partner=<?php echo $partner['id_partner']; ?>">Edit</a>
                                <a href="deletepartner.php?id_partner=<?php echo $partner['id_partner']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Manage Contracts</h2>
            <a href="addContract.php" class="btn">Add New Contract</a>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Partner</th>
                        <th>Dates</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contracts as $contract): ?>
                        <tr>
                            <td><?php echo $contract['titre']; ?></td>
                            <td><?php echo $contract['description']; ?></td>
                            <td><?php echo $contract['partner_id']; ?></td> <!-- Get partner name in a real setup -->
                            <td><?php echo $contract['date_creation'] . ' - ' . $contract['date_fin']; ?></td>
                            <td>
                                <a href="updateContract.php?id=<?php echo $contract['id']; ?>">Edit</a>
                                <a href="deleteContract.php?id=<?php echo $contract['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
    <script src="../public/js/scriptAdmin.js" defer></script>
</body>
</html>
