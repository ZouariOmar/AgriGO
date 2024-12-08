<?php



include "../Models/response.php";
include_once "../Controllers/adminreportController.php";
include_once "../Controllers/responseController.php";

// Check if reportid is set in the query string
if (isset($_GET['reportid'])) {
    $reportid = $_GET['reportid'];
} else {
    die("Error: Report ID not provided.");
}

// Check if form data is set
if (isset($_POST["response"])) {
    if (!empty($reportid) && !empty($_POST["response"])) {
        // Create the response object
        $response = new response(null, $reportid, $_POST["response"]);
        
        // Initialize the response controller
        $responseC = new responseController();
        
        // Add the response to the database
        if ($responseC->addResponse($response)) {
            header("Location: adminreportList.php");
            exit(); // Stop further execution after redirect
        } else {
            echo "Error: Unable to add response.";
        }
    } else {
        echo "Error: All fields are required.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Response</title>
    <link rel="stylesheet" href="../../public/css/addresponsestyle.css"> <!-- Link to the updated CSS file -->
</head>
<body>
    <h1>Add Response</h1>
    <form method="POST" action="addResponse.php?reportid=<?php echo htmlspecialchars($reportid); ?>">
        <input type="hidden" id="reportid" name="reportid" value="<?php echo htmlspecialchars($reportid); ?>">

        <label for="response">Response :</label>
        <textarea id="response" name="response" rows="4" required></textarea><br>

        <button type="submit">Add Response</button>
    </form>
</body>
</html>