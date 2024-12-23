<?php

include "../Models/response.php";
include_once "../Controllers/adminreportController.php";
include_once "../Controllers/responseController.php";

// Check if reportid is set in the query string
$reportid = $_GET['reportid'];
$admin_id = $_GET['id'];


// Check if form data is set
if (isset($_POST["response"])) {
    if (!empty($reportid) && !empty($_POST["response"])) {
        // Create the response object
        $response = new response(null, $reportid, $_POST["response"]);

        // Initialize the response controller
        $responseC = new responseController();

        // Add the response to the database
        if ($responseC->addResponse($response)) {
            header("Location: dashboard.php?id=" . $admin_id);
            exit(); // Stop further execution after redirect
        } else
            echo "Error: Unable to add response.";

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
    <script src="../../public/js/addresponse.js" defer></script> <!-- Link to the JavaScript file -->
</head>

<body>
    <h1>Add Response</h1>
    <form method="POST" action="addResponse.php?reportid=<?php echo htmlspecialchars($reportid); ?>&id=<?php echo htmlspecialchars($admin_id); ?>">
        <input type="hidden" id="reportid" name="reportid" value="<?php echo htmlspecialchars($reportid); ?>">

        <label for="response">Response :</label>
        <textarea id="response" name="response" rows="4"></textarea><br>

        <button type="submit">Add Response</button>
    </form>
</body>

</html>