<?php
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

function users_table($array, $admin_id)
{
    if (empty($array)) {
        echo '<tr><td colspan="7" class="text-center">Nothing Her!</td></tr>';
        return;
    }
    foreach ($array as $raw) {
        echo '
    <tr>
        <td>
            <i class="fab fa-angular fa-lg text-danger me-3"></i>
            <strong>' . htmlspecialchars($raw['Username']) . '</strong>
        </td>
        <td>' . htmlspecialchars($raw['Email']) . '</td>
        <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                    class="avatar avatar-xs pull-up" title="' . htmlspecialchars($raw['Username']) . '">
                    <img src="../../public/assets/default-user.png" alt="Avatar" class="rounded-circle" />
                </li>
            </ul>
        </td>
        <td>' . $raw['Created_at'] . '</td>
        <td>' . $raw['Updated_at'] . '</td>
        <td>
            <span class="badge ' .
            (($raw['Status'] === 'ACTIVE') ? " bg-label-success" : (($raw['Status'] === 'INACTIVE') ? "bg-label-warning"
                : "bg-label-danger")) . ' me-1">
            ' . $raw['Status'] . '
            </span>
        </td>
            <td>
                ' . del_AToAA($raw, $admin_id) . '
            </td>
        </td>
    </tr>';
    }
}

/**
 * ### Del admin to admin actions
 * @return string
 */
function del_AToAA($raw, $admin_id) {
    if ($raw['Role_ID'] != 2) {
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
                    ><i class=" ' . ($raw['Status'] == 'SUSPENDED' ? 'bx bx-lock-open' : 'bx bx-block') . ' me-1"></i> '. ($raw['Status'] == 'SUSPENDED' ? 'Reactive' : 'Suspend') . '</a
                >
            </div>
        </div>
        ';
    }
    return '';
}