<?php
/**
 * @file editUsr.php
 * @author zouari_omar <zouariomar20@gmail.com>
 */

//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

// Fetch data
$admin_id = $_GET['admin_id'] ?? null;
$cmd_id = $_GET['cmd_id'] ?? null;

$db->query("UPDATE Commend SET Validation = 'YES' WHERE Cmd_ID = :id", [
  'id' => $cmd_id
]);

// Start Session
session_start();
$_SESSION['status'] = 'The commend has been successfully validate !';

// Redirect to the dashboard
header('Location: ../Views/dashboard.php?id=' . $admin_id);