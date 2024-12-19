<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

// Fetch data
$user_id = $_GET['id'] ?? null;
$total = $_GET['total'] ?? null;
$list = $_GET['list'] ?? null;

// Insert product into the cart table
$stmt = $db->query('INSERT INTO Commend (Usr_ID, Total, Product_List) VALUES (:user_id, :total, :list)', [
  'user_id' => $user_id,
  'total' => $total,
  'list' => $list
]);

// Redirect to delCart page (to empty the cart)
header('Location: delCart.php?id=' . $user_id);
