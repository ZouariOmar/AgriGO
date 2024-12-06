<?php
include "../Model/partner.php";
include "../Controller/partnerController.php";

$partner = null;
$error = "";
// create an instance of the controller
$partnerController = new partnerController();

// Vérification des clés avant traitement
if (
    isset($_POST["name"])  && isset($_POST["email"]) && isset($_POST["number"])
) {
    if (
        !empty($_POST["name"])  && !empty($_POST["email"]) && !empty($_POST["number"])
    ) {
        // Créer un objet partenaire avec les nouvelles données
        $partner = new partner(
            null,
            $_POST['name'],
            $_POST['email'],
            $_POST['number'],
        );
        // Mise à jour des données du partenaire
        $partnerController->updatepartner($partner, $_POST['id_partner']);
        header('Location:partnerList.php'); // Redirection vers la liste des partenaires
    } else {
        $error = "Missing information"; // Message en cas de données manquantes
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style-1.css">
    <title>Update Partner</title>
</head>

<body>

    <?php
    if (isset($_POST['id_partner'])) {
        $partner = $partnerController->getpartnerById($_POST['id_partner']);
    ?>
        <!-- Formulaire pré-rempli avec les données actuelles du partenaire -->
        <form id="partner" action="" method="POST">
            <label for="id_partner">ID Partner:</label>
            <input class="form-control form-control-user" type="text" id="id_partner" name="id_partner" readonly value="<?php echo $_POST['id_partner']; ?>"><br>

            <label for="name">Partner Name:</label>
            <input class="form-control form-control-user" type="text" id="name" name="name" value="<?php echo $partner['name']; ?>"><br>

            <label for="email">Email:</label>
            <input class="form-control form-control-user" type="text" id="email" name="email" value="<?php echo $partner['email']; ?>"><br>

            <label for="number">Number:</label>
            <input class="form-control form-control-user" type="text" id="number" name="number" value="<?php echo $partner['number']; ?>"><br>

            <input type="submit" value="Save">
        </form>
    <?php
    }
    ?>

    <script src="../public/js/script-1.js" defer></script>

</body>

</html>
