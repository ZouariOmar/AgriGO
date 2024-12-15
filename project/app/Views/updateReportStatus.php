<?php
// Setup error debug mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//? Include declaration part
include "../Controllers/adminreportController.php";

// Fetch data from url using GET request
$admin_id = $_GET['id'];
$reportid = $_GET['reportID'];
$status = $_GET['status'];

// Update the status of the report
$adminreportC = new adminreportController();
$adminreportC->updateReportStatus($reportid, $status);

// Redirect to dashboard
header("Location: dashboard.php?id=" . $admin_id);
?>