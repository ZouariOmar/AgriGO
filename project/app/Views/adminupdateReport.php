<?php

include "../Models/adminreport.php";  
include "../Controllers/adminreportController.php";  

ob_start(); // Make sure no output is sent before headers

// Initialize variables
$adminreport = null;
$error = "";

// Initialize the controller
$adminreportC = new adminreportController();

// Retrieve report data using POST or GET
if (isset($_POST['id']) || isset($_GET['id'])) {
    $report_id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $adminreport = $adminreportC->getReportById($report_id);

    if (!$adminreport) {
        die("Error: Report not found.");
    }
} else {
    die("Error: ID not provided.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $status = isset($_POST['ST']) ? trim($_POST['ST']) : '';
    $report_id = isset($_POST['id']) ? trim($_POST['id']) : '';

    // Log values for debugging
    error_log("Form Submission: Status = '" . $status . "', ID = '" . $report_id . "'");

    // Check if the Status and ID fields are populated
    if (!empty($status) && !empty($report_id)) {
        // Attempt to update the report status
        if ($adminreportC->updateReportStatus($report_id, $status)) {
            header('Location: adminreportList.php');
            exit;
        } else {
            $error = "Update failed. Please check the update function.";
        }
    } else {
        $error = "Error: Status and ID fields are required.";
        error_log($error);
    }
}

// Display error if any
if (!empty($error)) {
    echo "<p style='color: red;'>$error</p>";
}

// Ensure output buffering is flushed before sending headers
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Report Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            text-align: center;
        }
        .status-button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .received {
            background-color: green;
        }
        .in-process {
            background-color: orange;
        }
        .done {
            background-color: blue;
        }
    </style>
</head>
<body>
    <h1>Update Report Status</h1>
    <p>Select the new status for the report.</p>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($report_id); ?>">
        <button class="status-button received" name="ST" value="RECIEVED">Recieved</button>
        <button class="status-button in-process" name="ST" value="IN PROCESS">In Process</button>
        <button class="status-button done" name="ST" value="DONE">Done</button>
    </form>
</body>
</html>