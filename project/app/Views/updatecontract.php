<?php
include "../Models/contract.php";
include "../Controllers/contractController.php";
include "../Controllers/PartnerController.php";

$contract = null;
$error = "";

// Fetching data from the url
$admin_id = $_GET['admin_id'] ?? $_POST['admin_id'] ?? null;
$contract_id = $_GET['cnt_id'] ?? $_POST['cnt_id'] ?? null;

// create an instance of the controller
$contractController = new contractController();
$partnerController = new partnerController();

if (isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["date_creation"]) && isset($_POST["date_fin"]) && isset($_POST["partner_id"])) {
    $contract = new contract(
        null,
        $_POST['titre'],
        $_POST['description'],
        $_POST['date_creation'],
        $_POST['date_fin'],
        $_POST['partner_id']
    );
    // Appeler la méthode pour mettre à jour le contrat
    $contractController->updateContract($contract, $contract_id);

    // Start Session
    session_start();
    $_SESSION['status'] = 'The contract has been successfully updated !';

    // Redirect to dashboard page
    header('Location: dashboard.php?id=' . $admin_id);
} else
    $error = "Missing information"; // Afficher un message si des informations manquent

$contract = $contractController->getcontractById($contract_id);
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
    <?php
    if ($contract) {
        ?>
        <!-- Formulaire pré-rempli avec les données actuelles du contrat -->
        <form id="contract" action="" method="POST">
            <!-- Sélectionner un partenaire -->
            <label for="partner_id">Choisir un partenaire</label>
            <select name="partner_id" id="partner_id">
                <?php foreach ($partners as $partner): ?>
                    <option value="<?= $partner['id_partner'] ?>" <?= ($partner['id_partner'] == $contract['partner_id']) ? 'selected' : ''; ?>>
                        <?= $partner['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">

            <!-- Récupérer les informations du contrat à mettre à jour -->
            <label for="titre">Titre du contrat</label>
            <input class="form-control" type="text" id="titre" name="titre" value="<?= $contract['titre']; ?>"><br>

            <label for="description">Description</label>
            <input class="form-control" type="text" id="description" name="description"
                value="<?= $contract['description']; ?>"><br>

            <label for="date_creation">Date de création</label>
            <input class="form-control" type="date" id="date_creation" name="date_creation"
                value="<?= $contract['date_creation']; ?>"><br>

            <label for="date_fin">Date de fin</label>
            <input class="form-control" type="date" id="date_fin" name="date_fin" value="<?= $contract['date_fin']; ?>"><br>

            <input type="hidden" name="id" value="<?= $contract_id; ?>">
            <input type="submit" value="Mettre à jour">
        </form>

        <?php
    } else {
        echo "<p>Contract not found.</p>";
    }
    ?>

    <script src="../public/js/scriptcontract-2.js" defer></script>

</body>

</html>