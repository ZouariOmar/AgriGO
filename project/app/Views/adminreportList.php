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
    <link rel="stylesheet" href="../../public/css/adminliststyle.css"> <!-- Link to the updated CSS file -->
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
                        <form method="GET" action="addResponse.php" class="reports-response-form">
                            <input type="hidden" name="reportid" value="<?= htmlspecialchars($report['StatRapportID']); ?>">
                            <input type="submit" value="Add Response" class="reports-response-button">
                        </form>
                        <form method="POST" action="updateReportStatus.php" class="reports-update-status-form">
                            <input type="hidden" name="reportid" value="<?= htmlspecialchars($report['StatRapportID']); ?>">
                            <input type="hidden" name="status" value="DONE">
                            <input type="submit" value="Mark as Done" class="reports-done-button">
                        </form>
                        <form method="POST" action="updateReportStatus.php" class="reports-update-status-form">
                            <input type="hidden" name="reportid" value="<?= htmlspecialchars($report['StatRapportID']); ?>">
                            <input type="hidden" name="status" value="IN PROCESS">
                            <input type="submit" value="Mark as in process" class="reports-done-button">
                        </form>
                        <form method="GET" action="adminviewResponses.php" class="reports-view-responses-form">
                            <input type="hidden" name="reportid" value="<?= htmlspecialchars($report['StatRapportID']); ?>">
                            <input type="submit" value="View Responses" class="reports-view-responses-button">
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