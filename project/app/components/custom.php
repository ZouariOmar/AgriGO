<?php
include_once '../../conf/database.php';
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
        $_SESSION['status'] = 'You Are SUSPENDED!';
        header($redirection);
        exit();
    }
}

class Fetch
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database('../../');
    }

    /**
     * Summary of fetch_user
     * * Fetch user from `Usr` table
     * @param int $user_id
     * @return array
     */
    public function fetch_user($user_id)
    {
        $user = $this->db->query("SELECT * FROM Usrs WHERE ID = :id", [
            'id' => $user_id
        ]);
        return $user[0];  // Select the first (and only) result
    }

    /**
     * Summary of fetch_user_profile
     * * Fetch user profile array
     * @param int $user_id
     * @return array
     */
    public function fetch_user_profile($user_id)
    {
        try {
            // Fetch the `user profile` using `user_id`
            $user_profile = $this->db->query("SELECT * FROM Usr_Profile WHERE Usr_ID = :id", [
                'id' => $user_id
            ]);
            return $user_profile[0];  // Return the first (and the only) result
        } catch (Exception $e) {
            // Handle any unexpected errors
            $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
            header("Location: ../Views/login.php");
            exit();
        }
    }

    /**
     * Summary of fetch_user_image
     * * Fetch User image Path
     * @param int $user_image_id
     * @return string
     */
    public function fetch_user_image($user_image_id)
    {
        $user_profile_image = $this->db->query("SELECT * FROM Images WHERE Image_ID = :Image_ID", [
            'Image_ID' => $user_image_id
        ]);
        return $user_profile_image[0]['Path'] ?? 'http://localhost/AgriGO/project/public/assets/default-user.png';
    }

    /**
     * Summary of fetch_users_number
     * * Fetch users number
     * - Access: $users_number['client_count'], $users_number['farmer_count'], $admin_count + $farmer_count
     * @return array
     */
    public function fetch_users_number()
    {
        $users = $this->db->query("SELECT 
        SUM(CASE WHEN Role_ID = 3 THEN 1 ELSE 0 END) AS client_count,
        SUM(CASE WHEN Role_ID = 4 THEN 1 ELSE 0 END) AS farmer_count,
        SUM(CASE WHEN Role_ID = 2 THEN 1 ELSE 0 END) AS admin_count
        FROM Usr_Roles");
        return $users[0];
    }

    /**
     * Summary of __fetch_users
     * * Fetch users that have a specific `user_role_id`
     * @param int $user_role_id
     * @return array
     */
    public function __fetch_users($user_role_id)
    {
        $_users = $this->db->query("SELECT U.* FROM Usrs AS U
            JOIN Usr_Roles AS UR ON U.ID = UR.Usr_ID
            WHERE UR.Role_ID = :role", [
            'role' => $user_role_id
        ]);
        return $_users;
    }

    /**
     * Summary of count_user_by_month
     * * Count user in specific month
     * @param string $date format('%Y-%m')
     * @return int
     */
    public function count_user_by_month($date)
    {
        $users_count = $this->db->query("SELECT 
            COUNT(*) AS UsersCount 
            FROM Usrs
            WHERE DATE_FORMAT(Created_at, '%Y-%m') = :date", [
            'date' => $date
        ]);
        return $users_count[0]['UsersCount'] ?? 0; // Default to 0 if no rows
    }
}