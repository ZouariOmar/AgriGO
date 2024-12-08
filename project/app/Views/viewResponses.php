<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../Controllers/responseController.php";
$responseC = new responseController();

// Check if reportid is set in the query string
if (isset($_GET['reportid'])) {
    $reportid = $_GET['reportid'];
} else {
   echo"Error: Report ID not provided.";
}
// Get the list of responses for the specified report ID
$list = $responseC->responseList($reportid);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Responses</title>
    <link rel="stylesheet" href="../../public/css/responsestyle.css"> <!-- Link to the updated CSS file -->
</head>

<body>
    <h1 class="responses-title">Responses for Report ID: <?= htmlspecialchars($reportid); ?></h1>

    <!-- Table to display responses -->
    <table class="responses-table">
        <thead>
            <tr>
                <th class="responses-table-header">Response ID</th>
                <th class="responses-table-header">Content</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list as $response) {
                ?>
                <tr class="responses-table-row">
                    <td class="responses-table-cell"><?= htmlspecialchars($response['ResponseID']); ?></td>
                    <td class="responses-table-cell"><?= htmlspecialchars($response['Response']); ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>