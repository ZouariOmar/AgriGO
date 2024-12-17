<?php
//? Include declaration part
include '../Controllers/contractController.php';

// Fetching from the url
$admin_id = $_GET['admin_id'];
$contract_id = $_GET['cnt_id'];

// Del contract
$contractC = new contractController();
$contractC->deletecontract($contract_id);

// Start Session
session_start();
$_SESSION['status'] = 'The contract has been successfully deleted!';

// Redirect to dashboard page
header('Location: dashboard.php?id=' . $admin_id);
?>