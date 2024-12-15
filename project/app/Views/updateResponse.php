<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../Models/response.php";
include "../Controllers/responseController.php";

ob_start(); // Make sure no output is sent before headers

// Initialize variables
$response = null;
$error = "";

// Initialize the controller
$responseC = new responseController();

// Retrieve response data using POST or GET
if (isset($_POST['responseid']) || isset($_GET['responseid'])) {
    $response_id = isset($_POST['responseid']) ? $_POST['responseid'] : $_GET['responseid'];
    error_log("Debug: response_id = " . $response_id); // Debugging statement
    $response = $responseC->getResponseById($response_id);
    error_log("Debug: response = " . print_r($response, true)); // Debugging statement

    if (!$response) {
        die("Error: Response not found.");
    }

} else {
    die("Error: Response ID not provided.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Response'])) {
    if (!empty($_POST['Response'])) {
        // Create the response object
        $response = new response(
            $response_id,
            null, // Assuming report ID is not needed for update
            $_POST['Response']
        );

        // Attempt to update the response
        if ($responseC->updateResponse($response, $response_id)) {
            header("Location: adminreportList.php");
            exit(); 
        } else {
            $error = "Update failed. Please check the update function.";
        }
    } else {
        $error = "Error: All fields are required.";
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
    <title>Update Response</title>
    <link rel="stylesheet" href="../../public/css/updatestyle.css">
    <script src="../../public/js/updateresponse.js" defer></script> <!-- Link to the JavaScript file -->
</head>
<body>

<h2>Update Response</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<?php if ($response): ?>
<form id="reportForm" action="updateResponse.php?responseid=<?php echo htmlspecialchars($response_id); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="responseid" value="<?php echo htmlspecialchars($response_id); ?>">

    <label for="Response">Response</label>
    <textarea id="Response" name="Response" rows="4"><?php echo htmlspecialchars($response['Response']); ?></textarea><br>

    <button type="submit">Update</button>
</form>

<?php else: ?>
<p>Response not found or invalid ID!</p>
<?php endif; ?>

</body>
</html>