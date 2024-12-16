<?php
include "../Models/contract.php";
include "../Controllers/contractController.php";
include "../Controllers/partnerController.php";

$contract = null;
$error = "";
// create an instance of the controller
$contractController = new contractController();
$partnerController = new partnerController();

// Vérification des clés avant traitement
if (
    isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["date_creation"]) && isset($_POST["date_fin"]) && isset($_POST["partner_id"])
) {
    if (
        !empty($_POST["titre"]) && !empty($_POST["description"]) && !empty($_POST["date_creation"]) && !empty($_POST["date_fin"]) && !empty($_POST["partner_id"])
    ) {
        // Créer un objet contract avec toutes les données, y compris partner_id
        $contract = new contract(
            null,
            $_POST['titre'],
            $_POST['description'],
            $_POST['date_creation'],
            $_POST['date_fin'],
            $_POST['partner_id']  // Utiliser partner_id
        );
        // Appeler la méthode pour mettre à jour le contrat
        $contractController->updateContract($contract, $_POST['id']);
        header('Location:contractList.php'); // Rediriger vers la liste des contrats
    } else {
        $error = "Missing information"; // Afficher un message si des informations manquent
    }
}

// Récupérer le contrat à mettre à jour si l'ID est passé
if (isset($_POST['id'])) {
    $contract = $contractController->getcontractById($_POST['id']);
}

// Récupérer la liste des partenaires
$partners = $partnerController->partnerList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/stylecontract-2.css">
    <title>Update Contract</title>
</head>

<body>
    <div style="text-align: right; margin: 10px;">
        <button id="theme-toggle">Switch to Dark Mode</button>
    </div>
    <?php
    if ($contract) {
    ?>
        <!-- Formulaire pré-rempli avec les données actuelles du contrat -->
        <form id="contract" action="" method="POST">
    <!-- Sélectionner un partenaire -->
    <label for="partner_id">Choisir un partenaire</label>
    <select name="partner_id" id="partner_id">
        <?php foreach ($partners as $partner): ?>
            <option value="<?= $partner['id_partner'] ?>" 
                <?= ($partner['id_partner'] == $contract['partner_id']) ? 'selected' : ''; ?>>
                <?= $partner['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Récupérer les informations du contrat à mettre à jour -->
    <label for="titre">Titre du contrat</label>
    <input class="form-control" type="text" id="titre" name="titre" value="<?= $contract['titre']; ?>"><br>

    <label for="description">Description</label>
    <input class="form-control" type="text" id="description" name="description" value="<?= $contract['description']; ?>"><br>

    <label for="date_creation">Date de création</label>
    <input class="form-control" type="date" id="date_creation" name="date_creation" value="<?= $contract['date_creation']; ?>"><br>

    <label for="date_fin">Date de fin</label>
    <input class="form-control" type="date" id="date_fin" name="date_fin" value="<?= $contract['date_fin']; ?>"><br>

    <input type="hidden" name="id" value="<?= $contract['id']; ?>"> <!-- Le champ caché pour l'ID -->
    <input type="submit" value="Mettre à jour">
</form>

    <?php
    } else {
        echo "<p>Contract not found.</p>";
    }
    ?>

    <script src="../../public/js/scriptcontract-2.js" defer></script>

</body>

</html>