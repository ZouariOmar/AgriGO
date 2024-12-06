<?php
include "../Model/contract.php";
include "../Controller/contractController.php";

if (
    isset($_POST["ptitre"])  && $_POST["description"] && $_POST["date_creation"] && $_POST["date_fin"]
) {
    if (
        !empty($_POST["ptitre"])  && !empty($_POST["description"]) && !empty($_POST["date_creation"]) && !empty($_POST["date_fin"])

    ) {
        $contract = new contract(null,$_POST["ptitre"], $_POST["description"], $_POST["date_creation"], $_POST["date_fin"]);
        $contractC = new contractController();
        $contractC->addcontract($contract);
        header('Location:contractList.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract.css">
    <title>Add contract</title>
</head>

<body>
<form method="post" action="">
    <select name="" id="">
        <option value="">partner1</option>
        <option value="">partner2</option>
        <option value="">partner3</option>
    </select>
    <label for="ptitre">contract titre:</label>
    <input type="text" name="ptitre">
    <!-- Message d'erreur pour le titre -->
    <div class="error"></div>

    <label for="description">description:</label>
    <input type="text" name="description">
    <!-- Message d'erreur pour la description -->
    <div class="error"></div>

    <label for="date_creation">date_creation:</label>
    <input type="date" name="date_creation">
    <!-- Message d'erreur pour la date_creation -->
    <div class="error"></div>

    <label for="date_fin">date_fin:</label>
    <input type="date" name="date_fin">
    <!-- Message d'erreur pour la date_fin -->
    <div class="error"></div>

    <input type="submit" value="Save">
</form>

    <script src="../public/js/scriptcontract.js"></script>
</body>

</html>