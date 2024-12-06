<?php

include "../Controller/contractController.php";
$contractC = new contractController();
$list = $contractC->contractList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract-1.css" >
    <title>CONTRACTLIST</title>
</head>

<body>
    <h1 class="page-title">CONTRACTLIST</h1>
    <a href="addcontract.php">Add</a>
    <table border>
        <tr>
            <th>Id</th>
            <th>contract title</th>
            <th>description</th>
            <th>date_creation</th>
            <th>date_fin</th>
            <td>Action</td>
        </tr>
        <?php
        foreach ($list as $contract) {
        ?> <tr>
                <td><?= $contract['id']; ?></td>
                <td><?= $contract['titre']; ?></td>
                <td><?= $contract['description']; ?></td>
                <td><?= $contract['date_creation']; ?></td>
                <td><?= $contract['date_fin']; ?></td>

                <td>
                    <!-- en cliquant sur le bouton update on appelle la page updatecontract.php et passe l'id du l'offre -->
                    <form method="POST" action="updatecontract.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $contract['id']; ?> name="id">
                    </form>
                    <!-- en cliquant sur le lien delete on appelle la page deletecontract.php et le id de l'offre sera passé dans l'url -->
                    <a href="deletecontract.php?id=<?= $contract['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script src="../public/js/scriptcontract-1.js"></script>
</body>

</html>