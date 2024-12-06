<?php
include_once '../include/database.php';
$id = $_GET['id'];
$etat = $_GET['etat'];
$sqlState = $pdo->prepare('UPDATE commande SET valide = ? WHERE id = ?');
$sqlState->execute([$etat, $id]);
header('location: ../models/commande.php?id=' . $id);
