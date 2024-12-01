<?php

include "../Models/Report.php";  // Include the model for report
include "../Controllers/adminreportController.php";  // Include the controller

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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Status'])) {
    if (!empty($_POST['Status'])) {
        // Create the report object (assuming no need for StatRapportID as we are just updating Status)
        $adminreport = new adminreport(
            null, // Assuming StatRapportID is not being updated here
            null, // StatRapportID is not relevant for update
            $_POST['Status']
        );

        // Attempt to update the report status
        if ($adminreportC->adminupdateReport($adminreport, $report_id)) {
            header('Location: adminreportList.php');
            exit; 
        } else {
            $error = "Update failed. Please check the update function.";
        }
    } else {
        $error = "Error: Status field is required.";
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
        <input type="hidden" name="StatRapportID" value="<?php echo $_GET['id']; ?>">
        <button class="status-button received" name="Status" value="'RECIEVED'">Recieved</button>
        <button class="status-button in-process" name="Status" value="'IN PROCESS'">In Process</button>
        <button class="status-button done" name="Status" value="'DONE'">Done</button>
    </form>
</body>
</html>
