partnerupdate
<?php
include "../Models/Partner.php";
include "../Controllers/PartnerController.php";

$error = "";

// Fetching data from the url
$admin_id = $_GET['admin_id'] ?? $_POST['admin_id'] ?? null;
$partner_id = $_GET['id_partner'] ?? $_POST['id_partner'] ?? null;

$partnerController = new partnerController();


// Vérification des clés avant traitement
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["number"]) && isset($_POST["status"])) {
    // Créer un objet partenaire avec les nouvelles données
    $partner = new partner(
        null,
        $_POST['name'],
        $_POST['email'],
        $_POST['number'],
        $_POST['status']
    );
    $partnerController->updatepartner($partner, $partner_id);

    // Start Session
    session_start();
    $_SESSION['status'] = 'The partner has been successfully updated !';

    // Redirect to dashboard page
    header('Location: dashboard.php?id=' . $admin_id);
} else
    $error = "Missing information";
// Fetch partner
$partner = $partnerController->getPartnerById($partner_id) ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/stylepartner-2.css">
    <title>AGRIGO || Update Partner</title>
</head>

<body>
    <?php
    if ($partner_id) {
        ?>
        <!-- Formulaire pré-rempli avec les données actuelles du partenaire -->
        <form id="partner" action="" method="POST">
            <input type="hidden" name="id_partner" value="<?php echo $partner['id_partner']; ?>">
            <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">

            <label for="name">Partner Name:</label>
            <input class="form-control form-control-user" type="text" id="name" name="name"
                value="<?php echo $partner['name']; ?>"><br>

            <label for="email">Email:</label>
            <input class="form-control form-control-user" type="text" id="email" name="email"
                value="<?php echo $partner['email']; ?>"><br>

            <label for="number">Number:</label>
            <input class="form-control form-control-user" type="text" id="number" name="number"
                value="<?php echo $partner['number']; ?>"><br>

            <!-- Ajout d'un champ pour le statut -->
            <label for="status">Status:</label>
            <select class="form-control form-control-user" id_partner="status" name="status">
                <option value="active" <?php echo ($partner['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                <option value="inactive" <?php echo ($partner['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
            </select><br>

            <input type="submit" value="Save">
            <a href="dashboard.php?id=<?php echo $admin_id; ?>">Cancel</a>
        </form>
        <?php
    }
    ?>

    <script src="../public/js/scriptpartner-2.js" defer></script>

</body>

</html>