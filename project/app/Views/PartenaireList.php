<?php

include '../Controllers/PartenaireController.php';
$PartenaireC = new PartenaireController();
$list = $PartenaireC->PartenaireList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Document</title>
</head>

<body>
    <a href="addPartenaire.php">Add</a>
    <table border>
        <tr>
            <th>Id</th>
            <th>Partenaire name</th>
            <th>email</th>
            <th>telephone</th>
            <td>Action</td>
        </tr>
        <?php
        foreach ($list as $Partenaire) {
        ?> <tr>
                <td><?= $Partenaire['id']; ?></td>
                <td><?= $Partenaire['name']; ?></td>
                <td><?= $Partenaire['email']; ?></td>
                <td><?= $Partenaire['telephone']; ?></td>

                <td>
                    <!-- en cliquant sur le bouton update on appelle la page updatePartenaire.php et passe l'id du Partenaire -->
                    <form method="POST" action="updatePartenaire.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $Partenaire['id']; ?> name="id">
                    </form>
                    <!-- en cliquant sur le lien delete on appelle la page deletePartenaire.php et le id du Partenaire sera passé dans l'url -->
                    <a href="deletePartenaire.php?id=<?= $Partenaire['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>