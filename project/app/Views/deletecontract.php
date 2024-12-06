<?php
include '../Controller/contractController.php';
$contractC = new contractController();

// récupérer l'id passé dans l'URL en utilisant la methode par défaut $_GET["id"]
$contractC->deletecontract($_GET["id"]);
//une fois la suppression est faite une redirection vers la liste des contracts ce fait
header('Location:contractList.php');

?>