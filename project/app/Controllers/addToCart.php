<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

$quantity = $_POST['quantity'] ?? null;
$user_id = $_POST['user_id'] ?? null;
$product_id = $_POST['product_id'] ?? null;

// Insert product into the cart table
$stmt = $db->query('INSERT INTO Cart (Usr_ID, Product_ID, Quantity) VALUES (:user_id, :product_id, :quantity)', [
  'user_id' => $user_id,
  'product_id' => $product_id,
  'quantity' => $quantity
]);

// Redirect to store page
header('Location: ../Views/Store.php?id=' . $user_id);
