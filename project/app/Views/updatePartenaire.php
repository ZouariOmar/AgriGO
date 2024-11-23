<?php
include "../Models/Partenaire.php";
include "../Controllers/PartenaireController.php";
$Partenaire = null;
$error = "";
// create an instance of the controller
$PartenaireController = new PartenaireController();

//utiliser la fonction isset() pour vérifier si les clés name, email et telephone existe avant d'y accéder
if (
    isset($_POST["name"])  && isset($_POST["email"]) && isset($_POST["telephone"])
) {
    //utiliser la fonction empty() pour vérifier si les clés name, email et telephone posséde des valeurs
    if (
        !empty($_POST["name"])  && !empty($_POST["email"]) && !empty($_POST["telephone"])
    ) {
        // créer un objet à partir des nouvelles valeurs passées pour mettre à jour le Partenaire choisi
        $Partenaire = new Partenaire(
            null,
            $_POST['name'],
            $_POST['email'],
            $_POST['telephone'],
        );
        // appelle de la fonction updatePartenaire
        $PartenaireController->updatePartenaire($Partenaire, $_POST['id']);
        // une fois l'update est faite une redirection vers la page liste des Partenaires sera faite
        header('Location:PartenaireList.php');
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
    <title>Document</title>
</head>

<body>

    <?php
    // $_POST['id'] récupérer à partir du form relative au bouton update dans la page PartenaireList
    if (isset($_POST['id'])) {
        //récupération du produit à mettre à jour par son ID
        $Partenaire = $PartenaireController->getPartenaireById($_POST['id']);
    ?>
        <!-- remplir le vormulaire par les données du produits à mettre à jour -->
        <form id="Partenaire" action="" method="POST">
            <label for="id">ID Partenaire:</label>
            <!-- remplir chaque input par la valeur adéquate dans l'attribut value  -->
            <input class="form-control form-control-user" type="text" id="id" name="id" readonly value="<?php echo $_POST['id'] ?>"><br>

            <label for="id">Partenaire Name </label>
            <!-- remplir chaque input par la valeur adéquate dans l'attribut value  -->

            <input class="form-control form-control-user" type="text" id="name" name="name" value="<?php echo $Partenaire['name'] ?>"><br>
            <label for="title">email</label>
            <input class="form-control form-control-user" type="text" id="email" name="email" value="<?php echo $Partenaire['email'] ?>"><br>
            <label for="title">telephone</label>
            <input class="form-control form-control-user" type="text" id="telephone" name="telephone" value="<?php echo $Partenaire['telephone'] ?>"><br>
            <input type="submit" value="save">
        </form>
    <?php
    }
    ?>



</body>

</html>