<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user_id = $_GET['id'] ?? $_POST['user_id'] ?? null;

include "../Models/report.php";
include_once "../Controllers/reportController.php";
include_once "../Controllers/adminreportController.php";

// Check if form data is set
if (isset($_POST["subject"]) && isset($_POST["category"]) && isset($_POST["description"]) && isset($_POST["user_id"])) {
  $report = new report(null, $_POST["category"], $_POST["subject"], $_POST["description"], "RECIEVED");
  $reportC = new reportController();
  $reportId = $reportC->addReport($report); // Step 1: Add report to 'rapports'
  if ($reportId) {
    $adminReportController = new adminreportController();
    if ($adminReportController->addAdminReport($reportId))
      header("Location: index.php?id=" . $user_id);
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

      <!-- User ID -->
      <input type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>

      <!-- Subject -->
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" placeholder="Enter subject">

      <!-- Description -->
      <label for="description">Description</label>
      <textarea id="description" name="description" placeholder="Describe the issue in detail" rows="4"></textarea>

      <!-- Submit Button -->
      <button type="submit">Submit Report</button>
    </form>
  </div>
</body>

</html>