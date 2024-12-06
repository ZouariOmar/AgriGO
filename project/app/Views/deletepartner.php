<?php
include '../Controller/partnerController.php';
$partnerC = new partnerController();

// récupérer l'id passé dans l'URL en utilisant la methode par défaut $_GET["id_partner"]
$partnerC->deletepartner($_GET["id_partner"]);
//une fois la suppression est faite une redirection vers la liste des partners ce fait
header('Location:partnerList.php');

?>