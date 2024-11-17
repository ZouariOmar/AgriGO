<?php
include "../Model/Partenaire.php";
include "../Controller/PartenaireController.php";

if (
    isset($_POST["pName"])  && $_POST["email"] && $_POST["telephone"]
) {
    if (
        !empty($_POST["pName"])  && !empty($_POST["email"]) && !empty($_POST["telephone"])

    ) {
        $Partenaire = new Partenaire(null,$_POST["pName"], $_POST["email"], $_POST["telephone"]);
        $PartenaireC = new PartenaireController();
        $PartenaireC->addPartenaire($Partenaire);
        header('Location:PartenaireList.php');
    }
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
    <form method="post" action="">
        <label for="">Partenaire name:</label>
        <input type="text" name="pName">
        <label for="">email:</label>
        <input type="text" name="email">
        <label for="">telephone:</label>
        <input type="text" name="telephone">
        <input type="submit" value="save">

    </form>
</body>

</html>