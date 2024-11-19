<?php
include "../Models/Report.php";
include "../Controllers/ReportController.php";

ob_start(); // Make sure no output is sent before headers

// Initialize variables
$report = null;
$error = "";

// Initialize the controller
$reportC = new reportController();

// Retrieve report data using POST or GET
if (isset($_POST['id']) || isset($_GET['id'])) {
    $report_id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $report = $reportC->getReportById($report_id);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subject'], $_POST['category'], $_POST['description'])) {
    if (!empty($_POST['subject']) && !empty($_POST['category']) && !empty($_POST['description'])) {
        $image = null;

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image = basename($_FILES['image']['name']);
            }
        }

        // Create the report object
        $report = new report(
            null,
            $_POST['category'],
            $_POST['subject'],
            $_POST['description'],
            $image
        );

        // Attempt to update the report
        if ($reportC->updateReport($report, $_POST['id'])) {
            header('Location: reportList.php');
            exit; 
        } else {
            $error = "Update failed. Please check the update function.";
        }
    }
}

// Ensure output buffering is flushed before sending headers
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Report</title>
    <link rel="stylesheet" href="../../public/css/updatestyle.css">
</head>
<body>

<h2>Update Report</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<?php if ($report): ?>
<form id="reportForm" action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $report['Report_ID']; ?>">

    <label for="category">Category</label>
    <select id="category" name="category">
        <option value="technical" <?php echo ($report['category'] == 'technical'); ?>>Technical Issue</option>
        <option value="service" <?php echo ($report['category'] == 'service'); ?>>Service Request</option>
        <option value="feedback" <?php echo ($report['category'] == 'feedback') ; ?>>Feedback</option>
        <option value="other" <?php echo ($report['category'] == 'other'); ?>>Other</option>
    </select><br>

    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($report['subject']); ?>" ><br>

    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4"><?php echo htmlspecialchars($report['description']); ?></textarea><br>

    <label for="image">Upload an image (optional)</label>
    <input type="file" id="image" name="image"><br>

    <button type="submit">Update Report</button>
</form>

<!-- Back button to go back to the report list -->
<button onclick="window.location.href='reportList.php'" class="back-btn">Back to Report List</button>

<?php else: ?>
<p>Report not found or invalid ID!</p>
<?php endif; ?>

</body>
<script src="../../public/js/reportscript.js"></script>
</html>
