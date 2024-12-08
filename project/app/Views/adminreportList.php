<?php

include "../Controllers/adminreportController.php";
$adminreportC = new adminreportController();
$adminlist = $adminreportC->reportList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report List</title>
    <link rel="stylesheet" href="../../public/css/liststyle.css"> <!-- Link to the updated CSS file -->
</head>

<body>
    <!-- Title section -->
    <h1 class="reports-title">Reports Dashboard</h1>
    
    <!-- Table to display reports -->
    <table class="reports-table">
        <thead>
            <tr>
                <th class="reports-table-header">Report ID</th>
                <th class="reports-table-header">Status</th>
                <th class="reports-table-header">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($adminlist as $report) {
                ?>
                <tr class="reports-table-row">
                    <td class="reports-table-cell"><?= htmlspecialchars($report['StatRapportID']); ?></td>
                    <td class="reports-table-cell"><?= htmlspecialchars($report['ST']); ?></td>
                    <td class="reports-table-cell reports-actions">
                        <form method="POST" action="adminupdateReport.php" class="reports-update-form">
                            <input type="submit" name="update" value="Update" class="reports-update-button">
                            <input type="hidden" value="<?= htmlspecialchars($report['Stat_ID']); ?>" name="id">
                        </form>
                        <form method="GET" action="addResponse.php" class="reports-response-form">
                            <input type="hidden" name="reportid" value="<?= htmlspecialchars($report['StatRapportID']); ?>">
                            <input type="submit" value="Add Response" class="reports-response-button">
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>