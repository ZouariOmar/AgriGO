<?php
require "../Models/report.php";
require "../Controllers/reportController.php";



// Check if form data is set
if (isset($_POST["subject"]) && isset($_POST["category"]) && isset($_POST["description"])) {

    // Ensure required fields are not empty
    if (!empty($_POST["subject"]) && !empty($_POST["category"]) && !empty($_POST["description"])) {
        
        // Create a new report object
        $report = new report(null, $_POST["category"], $_POST["subject"], $_POST["description"], "RECEIVED");

        // Initialize the reportController
        $reportC = new reportController();

        // Step 1: Add the report to the 'rapports' table and get the Report_ID
        $reportC->addReport($report);

        header("Location: reportList.php");

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
  <script src="../../public/js/reportscript.js"></script>
</body>
</html>