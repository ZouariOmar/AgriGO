<?php
include "../Models/contract.php";
include "../Controllers/contractController.php";

$contract = null;
$error = "";

// Création d'une instance du contrôleur
$contractController = new contractController();

// Vérification des champs du formulaire
if (
    isset($_POST["titre"]) &&
    isset($_POST["description"]) &&
    isset($_POST["date_creation"]) &&
    isset($_POST["date_fin"]) &&
    isset($_POST["id_partner"]) // Partner lié au contrat
) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["date_creation"]) &&
        !empty($_POST["date_fin"]) &&
        !empty($_POST["id_partner"])
    ) {
        // Créer un nouvel objet Contract
        $contract = new contract(
            null, // ID est auto-incrémenté
            $_POST['titre'],
            $_POST['description'],
            $_POST['date_creation'],
            $_POST['date_fin'],
            $_POST['id_partner']
        );

        // Ajouter le contrat via le contrôleur
        $contractController->addContract($contract);

        // Redirection vers la liste des contrats
        header('Location: contractList.php');
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract.css">
    <title>Ajouter un Contrat</title>
</head>

<body>
    <h1>Ajouter un Nouveau Contrat</h1>
    <div style="text-align: right; margin: 10px;">
        <button id="theme-toggle">Mode Sombre</button>
    </div>

    <!-- Affichage des erreurs -->
    <?php if ($error) { ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php } ?>

    <!-- Formulaire pour ajouter un contrat -->
    <form action="" method="POST">
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="date_creation">Date de Création:</label>
        <input type="date" id="date_creation" name="date_creation" required><br>

        <label for="date_fin">Date de Fin:</label>
        <input type="date" id="date_fin" name="date_fin" required><br>

        <label for="id_partner">ID du Partenaire:</label>
        <input type="number" id="id_partner" name="id_partner" required><br>

        <button type="submit">Ajouter</button>
        <a href="contractList.php">Annuler</a>
    </form>

    <script src="../public/js/scriptcontract.js"></script>
</body>

</html>
