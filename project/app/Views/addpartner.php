<?php
include "../Models/partner.php";
include "../Controllers/partnerController.php";

$partner = null;
$error = "";

// Création d'une instance du contrôleur
$partnerController = new partnerController();

if (
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["number"]) &&
    isset($_POST["status"])
) {
    if (
        !empty($_POST["name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["number"]) &&
        !empty($_POST["status"])
    ) {
        // Créer une nouvelle instance de partenaire
        $partner = new Partner(
            null,
            $_POST['name'],
            $_POST['email'],
            $_POST['number'],
            $_POST['status']
        );

        // Appeler la méthode pour ajouter le partenaire
        $partnerController->addPartner($partner);
        header('Location: partnerList.php'); // Redirection vers la liste des partenaires après ajout
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylepartner.css">
    <title>Add Partner</title>
</head>

<body>
    <div style="text-align: right; margin: 10px;">
        <button id="theme-toggle">Switch to Dark Mode</button>
    </div>

    <h1>Add New Partner</h1>

    <?php
    if ($error) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form action="" method="POST">
        <label for="name">Partner Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter partner name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter partner email" required><br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number" placeholder="Enter partner number" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br>

        <input type="submit" value="Add Partner">
        <a href="partnerList.php">Cancel</a>
    </form>

    <script src="../public/js/scriptpartner.js" defer></script>
</body>

</html>
