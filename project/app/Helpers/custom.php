<?php
/**
 * ? Custom php functions
 * @author zouari_omar <zouariomar20@gmail.com>
 */

//? Include declaration part
include_once '../../conf/database.php';
include_once '__include__.php';

function alert($class, $msg)
{
    echo '<div class="' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '">
			  <span class="closebtn">&times;</span>
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>     '
        . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') .
        '</div>';
}

function alert1($class, $msg)
{
    echo '<div id="alert1" class="' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '">
			  <span class="display-6 bx bxs-bell"></span>
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>     '
        . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') .
        '</div>';
}

function redirect($url, $seconds)
{
    echo "<script>
        setTimeout(function() {
            window.location.href = '$url';
        }, $seconds); // Redirect after 2 seconds
    </script>";
}

function users_table($array, $admin_id, $role)
{
    if (empty($array)) {
        echo '<tr><td colspan="7" class="text-center">Nothing Her!</td></tr>';
        return;
    }
    $fetch = new Fetch();
    foreach ($array as $raw) {
        // Fetching
        $user = $fetch->fetch_user_profile($raw['ID']);
        $user_profile_image = $fetch->fetch_user_image($user['Image_ID']);
        echo '
    <tr class="user-row">
        <td class="username fw-bold">' . htmlspecialchars($raw['Username']) . '</td>
        <td class="email">' . htmlspecialchars($raw['Email']) . '</td>
        <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                    class="avatar avatar-xs pull-up" title="' . htmlspecialchars($raw['Username']) . '">
                    <img src="' . $user_profile_image . '" alt="Avatar" class="rounded-circle" />
                </li>
            </ul>
        </td>
        <td class="created_at">' . $raw['Created_at'] . '</td>
        <td class="updated_at">' . $raw['Updated_at'] . '</td>
        <td>
            <span class="badge status ' .
            (($raw['Status'] === 'ACTIVE') ? " bg-label-success" : (($raw['Status'] === 'INACTIVE') ? "bg-label-warning"
                : "bg-label-danger")) . ' me-1">
            ' . $raw['Status'] . '
            </span>
        </td>
        <td>
            ' . del_AToAA($raw, $admin_id, $role) . '
        </td>
    </tr>';
    }
}

/**
 * ### Del admin to admin actions
 * @return string
 */
function del_AToAA($raw, $admin_id, $role)
{
    if ($role != 2) {
        return '
        <div class="dropdown">
            <button
                type="button"
                class="btn p-0 dropdown-toggle hide-arrow"
                data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a
                    class="dropdown-item"
                    href="javascript:void(0);"
                    ><i class="bx bx-message-alt me-1"></i> Message</a
                >
                <a
                    class="dropdown-item"
                    href="../Controllers/setUsrStatus.php?admin_id=' . $admin_id . '&id=' . $raw['ID'] . '&status=' . ($raw['Status'] == 'SUSPENDED' ? 'ACTIVE' : 'SUSPENDED') . '"
                    ><i class=" ' . ($raw['Status'] == 'SUSPENDED' ? 'bx bx-lock-open' : 'bx bx-block') . ' me-1"></i> ' . ($raw['Status'] == 'SUSPENDED' ? 'Reactive' : 'Suspend') . '</a
                >
            </div>
        </div>
        ';
    }
    return '';
}

function reports_table($array, $admin_id)
{
    if (empty($array)) {
        echo '<tr><td colspan="7" class="text-center">Nothing Her!</td></tr>';
        return;
    }
    // $fetch = new Fetch();
    foreach ($array as $raw) {
        // Fetching
        // $user = $fetch->fetch_user_profile($raw['ID']);
        // $user_profile_image = $fetch->fetch_user_image($user['Image_ID']);
        echo '
    <tr class="user-row">
        <td class="username fw-bold">' . htmlspecialchars($raw['category']) . '</td>
        <td class="email">' . htmlspecialchars($raw['subject']) . '</td>
        <td >' . htmlspecialchars($raw['description']) . '</td>
        <td class="updated_at">' . $raw['Update_at'] . '</td>
        <td class="created_at">' . $raw['Created_at'] . '</td>
        <td class="status">
            <span class="badge status ' .
            (($raw['sta'] === 'DONE') ? " bg-label-success" : (($raw['sta'] === 'RECIEVED') ? "bg-label-warning"
                : "bg-label-danger")) . ' me-1">
            ' . $raw['sta'] . '
            </span>
        </td>
        <td>
            <div class="dropdown">
                <button
                    type="button"
                    class="btn p-0 dropdown-toggle hide-arrow"
                    data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a
                        class="dropdown-item"
                        href="addResponse.php?reportid=' . $raw['Report_ID'] .'&id=' . $admin_id . '"
                        ><i class="bx bx-message-rounded-add me-1"></i> Add Response</a
                    >
                    <a
                        class="dropdown-item"
                        href="viewResponses.php?reportid=' . $raw['Report_ID'] . '&id=' . $admin_id . '"
                        ><i class="bx bx-list-ul me-1"></i> View Responses</a
                    >'
                    . (
                    $raw['sta'] != 'DONE'
                    ? 
                    '<a
                        class="dropdown-item"
                        href="updateReportStatus.php?id=' . $admin_id . '&reportID=' . $raw['Report_ID'] . '&status=' . ($raw['sta'] == 'RECIEVED' ? 'IN PROCESS' : 'DONE') . '"
                        ><i class="bx bx-check-double me-1"></i> ' . ($raw['sta'] == 'RECIEVED' ? 'Mark as In Process' : 'Mark as Done') . '</a
                    >'
                    :
                    ''
                    ) .
                    '<a
                        class="dropdown-item"
                        href="deleteReport.php?admin_id=' . $admin_id . '&id=' . $raw['Report_ID'] . '"
                        ><i class="bx bx-folder-minus me-1"></i> Delete</a
                    >
                </div>
            </div>
        </td>
    </tr>';
    }
}

/**
 * Summary of is_suspend
 * * Verify if the user is suspended or not
 * @param string $redirection
 * @return void
 */
function is_suspend($user_id, $redirection)
{
    //* Connect to the DB
    $db = new Database('../../');

    // Fetch the `user` using `id` to verify if the user is suspended or not
    $user = $db->query("SELECT Status FROM Usrs WHERE ID = :id", [
        'id' => $user_id
    ]);

    if ($user[0]['Status'] == 'SUSPENDED') {
        $_SESSION['status'] = 'You Are Suspended!';
        header($redirection);
        exit();
    }
}

function set_active($user_id)
{
    //* Connect to the DB
    $db = new Database('../../');
    $db->query("UPDATE Usrs SET Status = 'ACTIVE' WHERE ID = :id", [
        'id' => $user_id
    ]);
}

