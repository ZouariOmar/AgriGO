<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

$user_id = $_GET['id'] ?? null;

// Insert product into the cart table
$stmt = $db->query('DELETE FROM Cart WHERE Usr_ID = :user_id', [
  'user_id' => $user_id
]);

// Redirect to store page
header('Location: ../Views/Store.php?id=' . $user_id);
