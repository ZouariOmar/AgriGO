<?php
include "../Models/report.php";
include "../Controllers/reportController.php";
ini_set('file_uploads', '1');

// Check if form data is set
if (isset($_POST["subject"]) && isset($_POST["category"]) && isset($_POST["description"])) {
    // Ensure required fields are not empty
    if (!empty($_POST["subject"]) && !empty($_POST["category"]) && !empty($_POST["description"])) {
        $imagePath = null; // Initialize image path

        // Check if an image file is uploaded
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/'; // Define upload directory

            // Create the directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                if (mkdir($uploadDir, 0777, true)) {
                    echo "Uploads folder created successfully.<br>";
                } else {
                    echo "Failed to create uploads folder.<br>";
                }
            }

            // Ensure the uploaded file has a unique name
            $uniqueFileName = uniqid() . "_" . basename($_FILES["image"]["name"]);
            $imagePath = $uploadDir . $uniqueFileName;

            // Move the uploaded file to the server directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
              echo "File uploaded successfully.<br>";
          } else {
              $error = $_FILES["image"]["error"];
              die("Failed to move uploaded file. Error code: $error<br>");
          }
        }

        // Create a new report object
        $report = new report (null, $_POST["category"], $_POST["subject"], $_POST["description"], $imagePath);

        // Initialize the reportController
        $reportC = new reportController();

        // Add the report to the database
        $reportC->addReport($report);

        // Redirect to the report list page
        header('Location: reportList.php');

        exit;
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

      <!-- Image Upload -->
      <label for="image">Upload Picture (Optional)</label>
      <input type="file" id="image" name="image">

      <!-- Submit Button -->
      <button type="submit">Submit Report</button>
    </form>
  </div>
  <script src="../../public/js/reportscript.js"></script>
</body>
</html>