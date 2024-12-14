<?php
include "../Model/partner.php";
include "../Controller/partnerController.php";

$partner = null;
$error = "";

$partnerController = new partnerController();

// Vérifier si l'ID du partenaire est passé dans l'URL ou via un formulaire
if (isset($_GET['id'])) {
    $partner = $partnerController->getPartnerById($_GET['id']);
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['name']) && isset($_POST['description'])) {
    if (!empty($_POST['name']) && !empty($_POST['description'])) {
        // Créer un objet partner avec les nouvelles informations
        $partner = new Partner($_POST['id'], $_POST['name'], $_POST['description']);

        // Mettre à jour les informations du partenaire dans la base de données
        $partnerController->updatePartner($partner);
        
        // Rediriger vers la liste des partenaires après la mise à jour
        header('Location: partnerList.php');
        exit;
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract-2.css">
    <title>Update Partner</title>
</head>

<body>
    <div style="text-align: right; margin: 10px;">
        <button id="theme-toggle">Switch to Dark Mode</button>
    </div>

    <?php if ($partner): ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $partner['id_partner'] ?>">

            <label for="name">Nom du partenaire:</label>
            <input type="text" name="name" value="<?= $partner['name'] ?>" required><br>

            <label for="description">Description:</label>
            <input type="text" name="description" value="<?= $partner['description'] ?>" required><br>

            <input type="submit" value="Save">
            <a href="partnerList.php">Cancel</a>
        </form>
    <?php else: ?>
        <p>Partenaire introuvable.</p>
    <?php endif; ?>

    <script src="../public/js/scriptcontract-2.js" defer></script>
</body>

</html>
