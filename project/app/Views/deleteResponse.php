<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../Controllers/responseController.php";
$responseC = new responseController();

// Check if responseid is set in the POST data
if (isset($_POST['responseid']) && isset($_POST['reportid'])) {
    $responseid = $_POST['responseid'];
    $reportid = $_POST['reportid'];
    $responseC->deleteResponse($responseid);
    header("Location: adminviewresponses.php?reportid=" . htmlspecialchars($reportid));
    exit(); // Stop further execution after redirect
} else {
    die("Error: Response ID or Report ID not provided.");
}
?>