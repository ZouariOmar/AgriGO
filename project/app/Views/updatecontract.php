<?php
include "../Model/contract.php";
include "../Controller/contractController.php";
$contract = null;
$error = "";
// create an instance of the controller
$contractController = new contractController();

//utiliser la fonction isset() pour vérifier si les clés titre, description, date_creation et date_fin existe avant d'y accéder
if (
    isset($_POST["titre"])  && isset($_POST["description"]) && isset($_POST["date_creation"]) && isset($_POST["date_fin"])
) {
    //utiliser la fonction empty() pour vérifier si les clés titre, description, date_creation et date_fin posséde des valeurs
    if (
        !empty($_POST["titre"])  && !empty($_POST["description"]) && !empty($_POST["date_creation"]) && !empty($_POST["date_fin"])
    ) {
        // créer un objet à partir des nouvelles valeurs passées pour mettre à jour l'Offre choisi
        $contract = new contract(
            null,
            $_POST['titre'],
            $_POST['description'],
            $_POST['date_creation'],
            $_POST['date_fin'],
        );
        // appelle de la fonction updatecontract
        $contractController->updatecontract($contract, $_POST['id']);
        // une fois l'update est faite une redirection vers la page liste des Offres sera faite
        header('Location:contractList.php');
    } else
        // message en cas de manque d'information
        $error = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylecontract-2.css">
    <title>UPDATECONTRACT</title>
</head>

<body>

    <?php
    // $_POST['id'] récupérer à partir du form relative au bouton update dans la page contractList
    if (isset($_POST['id'])) {
        //récupération du contract à mettre à jour par son ID
        $contract = $contractController->getcontractById($_POST['id']);
    ?>
        <!-- remplir le vormulaire par les données des offres à mettre à jour -->
        <form id="contract" action="" method="POST">
            <label for="id">ID contract:</label>
            <!-- remplir chaque input par la valeur adéquate dans l'attribut value  -->
            <input class="form-control form-control-user" type="text" id="id" name="id" readonly value="<?php echo $_POST['id'] ?>"><br>

            <label for="id">contract title </label>
            <!-- remplir chaque input par la valeur adéquate dans l'attribut value  -->

            <input class="form-control form-control-user" type="text" id="name" name="titre" value="<?php echo $contract['titre'] ?>"><br>
            <label for="title">description</label>
            <input class="form-control form-control-user" type="text" id="description" name="description" value="<?php echo $contract['description'] ?>"><br>
            <label for="title">date_creation</label>
            <input class="form-control form-control-user" type="date" id="date_creation" name="date_creation" value="<?php echo $contract['date_creation'] ?>"><br>
            <label for="title">date_fin</label>
            <input class="form-control form-control-user" type="date" id="date_fin" name="date_fin" value="<?php echo $contract['date_fin'] ?>"><br>
            <input type="submit" value="save">
        </form>
    <?php
    }
    ?>

<script src="../public/js/scriptcontract-2.js" defer></script>


</body>

</html>