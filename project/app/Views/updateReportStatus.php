<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../Controllers/adminreportController.php";
$adminreportC = new adminreportController();

// Check if reportid and status are set in the POST data
if (isset($_POST['reportid']) && isset($_POST['status'])) {
    $reportid = $_POST['reportid'];
    $status = $_POST['status'];

    // Update the status of the report
    $adminreportC->updateReportStatus($reportid, $status);

    // Redirect back to the report list
    header("Location: adminreportList.php");
    exit();
} else {
    die("Error: Report ID or status not provided.");
}
?>