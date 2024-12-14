partnerupdate
<?php
include "../Models/partner.php";
include "../Controllers/partnerController.php";

$partner = null;
$error = "";
// create an instance of the controller
$partnerController = new partnerController();

// Vérification des clés avant traitement
if (
    isset($_POST["name"])  && isset($_POST["email"]) && isset($_POST["number"]) && isset($_POST["status"])
) {
    if (
        !empty($_POST["name"])  && !empty($_POST["email"]) && !empty($_POST["number"]) && !empty($_POST["status"])
    ) {
        // Créer un objet partenaire avec les nouvelles données
        $partner = new partner(
            null,
            $_POST['name'],
            $_POST['email'],
            $_POST['number'],
            $_POST['status']  // Ajout du statut
        );
        // Mise à jour des données du partenaire
        $partnerController->updatepartner($partner, $_POST['id_partner']);
        header('Location:partnerList.php'); // Redirection vers la liste des partenaires
    } else {
        $error = "Missing information"; // Message en cas de données manquantes
    }
    // Récupérer le contrat à mettre à jour si l'ID est passé
    if (isset($_POST['id_partner'])) {
        $partner = $partnerController->getPartnerById($_POST['id_partner']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylepartner-2.css">
    <title>Update Partner</title>
</head>

<body>
    <div style="text-align: right; margin: 10px;">
        <button id_partner="theme-toggle">Switch to Dark Mode</button>
    </div>
    <?php
    if (isset($_POST['id_partner'])) {
        $partner = $partnerController->getpartnerById($_POST['id_partner']);
    ?>
        <!-- Formulaire pré-rempli avec les données actuelles du partenaire -->
        <form id="partner" action="" method="POST">
        <input type="hidden" name="id_partner" value="<?php echo $partner['id_partner']; ?>">

            <label for="name">Partner Name:</label>
            <input class="form-control form-control-user" type="text" id="name" name="name" value="<?php echo $partner['name']; ?>"><br>

            <label for="email">Email:</label>
            <input class="form-control form-control-user" type="text" id="email" name="email" value="<?php echo $partner['email']; ?>"><br>

            <label for="number">Number:</label>
            <input class="form-control form-control-user" type="text" id="number" name="number" value="<?php echo $partner['number']; ?>"><br>

            <!-- Ajout d'un champ pour le statut -->
            <label for="status">Status:</label>
            <select class="form-control form-control-user" id_partner="status" name="status">
                <option value="active" <?php echo ($partner['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                <option value="inactive" <?php echo ($partner['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
            </select><br>

            <input type="submit" value="Save">
            <a href="partnerList.php">Cancel</a>
        </form>
    <?php
    }
    ?>

    <script src="../public/js/scriptpartner-2.js" defer></script>

</body>

</html>