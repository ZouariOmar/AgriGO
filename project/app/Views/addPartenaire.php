<?php
include "../Model/partner.php";
include "../Controller/partnerController.php";

if (
    isset($_POST["pName"])  && $_POST["email"] && $_POST["number"]
) {
    if (
        !empty($_POST["pName"])  && !empty($_POST["email"]) && !empty($_POST["number"])

    ) {
        $partner = new partner(null,$_POST["pName"], $_POST["email"], $_POST["number"]);
        $partnerC = new partnerController();
        $partnerC->addpartner($partner);
        header('Location:partnerList.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style-1.css">
    <title>ADD PARTNER</title>
</head>

<body>
<form method="post" action="">
    <label for="pName">partner name:</label>
    <input type="text" name="pName">
    <!-- Message d'erreur pour le nom -->
    <div class="error"></div>

    <label for="email">Email:</label>
    <input type="text" name="email">
    <!-- Message d'erreur pour l'email -->
    <div class="error"></div>

    <label for="number">number:</label>
    <input type="text" name="number">
    <!-- Message d'erreur pour le téléphone -->
    <div class="error"></div>

    <input type="submit" value="Save">
</form>

    <script src="../public/js/script-2.js"></script>
</body>

</html>