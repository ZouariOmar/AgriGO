<?php
include '../Controller/PartenaireController.php';
$PartenaireC = new PartenaireController();

// récupérer l'id passé dans l'URL en utilisant la methode par défaut $_GET["id"]
$PartenaireC->deletePartenaire($_GET["id"]);
//une fois la suppression est faite une redirection vers la liste des Partenaires ce fait
header('Location:PartenaireList.php');

?>