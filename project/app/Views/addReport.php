<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../Models/report.php";
include_once "../Controllers/reportController.php";
include_once "../Controllers/adminreportController.php";



// Check if form data is set
if (isset($_POST["subject"]) && isset($_POST["category"]) && isset($_POST["description"])) {
  if (!empty($_POST["subject"]) && !empty($_POST["category"]) && !empty($_POST["description"])) {
      $report = new report(null, $_POST["category"], $_POST["subject"], $_POST["description"], "RECIEVED");
      $reportC = new reportController();
      $reportId = $reportC->addReport($report); // Step 1: Add report to 'rapports'

      if ($reportId) { // Ensure Report_ID is valid
          $adminReportController = new adminreportController();
          if ($adminReportController->addAdminReport($reportId)) { // Step 2: Add report to 'rapportstat'
              header("Location: reportList.php");
              exit(); // Stop further execution after redirect
          }
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Form</title>
  <link rel="stylesheet" href="../../public/css/reportstyle.css">
  <script src="../../public/js/reportscript.js"></script>
</head>
<body>
  <div class="form-container">
    <h1>Report an Issue</h1>
    <form id="reportForm" action="addReport.php" method="POST" enctype="multipart/form-data">
      
      <!-- Category Selection -->
      <label for="category">Category</label>
      <select id="category" name="category">
        <option value="">Select Category</option>
        <option value="technical">Technical Issue</option>
        <option value="service">Service Request</option>
        <option value="feedback">Feedback</option>
        <option value="other">Other</option>
      </select>

      <!-- Subject -->
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" placeholder="Enter subject" >

      <!-- Description -->
      <label for="description">Description</label>
      <textarea id="description" name="description" placeholder="Describe the issue in detail" rows="4" ></textarea>

      <!-- Submit Button -->
      <button type="submit">Submit Report</button>
    </form>
  </div>
</body>
</html>