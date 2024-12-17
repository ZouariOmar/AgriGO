<?php
include "../Models/contract.php";
include "../Controllers/contractController.php";
include "../Controllers/PartnerController.php";

// Fetch admin id from url
$admin_id = $_GET['admin_id'] ?? $_POST['admin_id'] ?? null;

// Récupérer la liste des partenaires
$partnerController = new partnerController();
$partners = $partnerController->partnerList();

if (isset($_POST["ptitre"]) && isset($_POST["description"]) && isset($_POST["date_creation"]) && isset($_POST["date_fin"]) && isset($_POST["partner_id"])) {

    // Créer l'objet contract avec l'ID du partenaire sélectionné
    $contract = new contract(
        null,
        $_POST["ptitre"],
        $_POST["description"],
        $_POST["date_creation"],
        $_POST["date_fin"],
        $_POST["partner_id"] // Ajouter le partenaire
    );

    // Ajouter le contrat
    $contractC = new contractController();
    $contractC->addcontract($contract);

    // Start Session
    session_start();
    $_SESSION['status'] = 'The contract has been successfully added!';

    header('Location: dashboard.php?id=' . $admin_id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/stylecontract-1.css">
    <title>Ajouter un contrat</title>
</head>

<body>
    <form method="post" action="">
        <label for="partner_id">Choisir un partenaire:</label>
        <select name="partner_id" id="partner_id">
            <?php foreach ($partners as $partner): ?>
                <option value="<?= $partner['id_partner'] ?>"><?= $partner['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="admin_id" value="<?php echo $admin_id ?>" hidden>
        <br>
        <label for="ptitre">Titre du contrat:</label>
        <input type="text" name="ptitre" required>

        <label for="description">Description:</label>
        <input type="text" name="description" required>

        <label for="date_creation">Date de création:</label>
        <input type="date" name="date_creation" required>

        <label for="date_fin">Date de fin:</label>
        <input type="date" name="date_fin" required>

        <input type="submit" value="Save">
        <a href="dashboard.php?id=<?php echo $admin_id; ?>">Cancel</a>
    </form>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    <script src="../public/js/scriptcontract-1.js"></script>
</body>

</html>