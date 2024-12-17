<?php
//? Include declaration part
include '../Controllers/PartnerController.php';

// Fetch data from url
$admin_id = $_GET['admin_id'];
$partner_id = $_GET["id_partner"];

// Delete the partner
$partnerC = new partnerController();
$partnerC->deletepartner($partner_id);

// Start Session
session_start();
$_SESSION['status'] = 'The partner has been successfully deleted !';

// Redirect to the dashboard
header('Location: dashboard.php?id=' . $admin_id);
?>