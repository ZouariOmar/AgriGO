<?php
//? Include declaration part
include '../Controllers/reportController.php';

// Fetch data from url
$admin_id = $_GET['admin_id'];
$report_id = $_GET["id"];

// Delete the report
$reportC = new reportController();
$reportC->deleteReport($report_id);

// Start Session
session_start();
$_SESSION['status'] = 'The report has been successfully deleted !';

// Redirect to the dashboard
header('Location: dashboard.php?id=' . $admin_id);
?>