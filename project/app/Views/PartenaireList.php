<?php

include "../Controller/partnerController.php";
$partnerC = new partnerController();
$list = $partnerC->partnerList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>PARTNER LIST</title>
</head>

<body>
    <a href="addpartner.php">Add</a>
    <table border>
        <tr>
            <th>Id_partner</th>
            <th>partner name</th>
            <th>email</th>
            <th>number</th>
            <td>Action</td>
        </tr>
        <?php
        foreach ($list as $partner) {
        ?> <tr>
                <td><?= $partner['id_partner']; ?></td>
                <td><?= $partner['name']; ?></td>
                <td><?= $partner['email']; ?></td>
                <td><?= $partner['number']; ?></td>

                <td>
                    <!-- en cliquant sur le bouton update on appelle la page updatepartner.php et passe l'id du partner -->
                    <form method="POST" action="updatepartner.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $partner['id_partner']; ?> name="id_partner">
                    </form>
                    <!-- en cliquant sur le lien delete on appelle la page deletepartner.php et le id du partner sera passé dans l'url -->
                    <a href="deletepartner.php?id_partner=<?= $partner['id_partner']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script src="../public/js/script.js"></script>
</body>

</html>