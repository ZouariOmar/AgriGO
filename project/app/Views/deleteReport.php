<?php
include '../Controllers/reportController.php';
$reportC = new reportController();

// récupérer l'id passé dans l'URL en utilisant la methode par défaut $_GET["id"]
$reportC->deleteReport($_GET["id"]);
//une fois la suppression est faite une redirection vers la liste des produits ce fait
header('Location:reportList.php');

?>