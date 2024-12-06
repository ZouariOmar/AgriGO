<?php
    require_once '../config/database.php';
    $id = $_GET['id'];
    $sqlState = $pdo->prepare('DELETE FROM produit WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location: ../views/produits.php');