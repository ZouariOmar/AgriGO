<?php
/**
 * @file __include__.php
 * @brief Main php inc file
 * - Status class
 * - SignIn class
 * @author zouari_omar <zouariomar20@gmail.com>
 * @version 1.0.0
 */

//? Include declaration part
include_once '../../../vendor/autoload.php';  // Load Composer autoload
include_once "../../conf/database.php";
include_once 'custom.php';

class Status
{
  private int $user_id;
  private int $admin_id;
  private string $status;
  private string $redirection;
  private Database $db;
  public function __construct($admin_id = null, $user_id = null, $status = 'ACTIVE')
  {
    $this->admin_id = $admin_id;
    $this->user_id = $user_id;
    $this->status = $status;
    $this->redirection = ($status != 'INACTIVE') ? 'Location: ../Views/dashboard.php?id=' . $this->admin_id : 'Location:
../Views/login.php';
    // Start the session to manage status messages
    session_start();
    //* Connect to the DB
    $this->db = new Database('../../');
  }
  public function set_usr_status()
  {
    try {
      // Set the status in `Suspend` status
      $stmt = $this->db->query("UPDATE Usrs SET Status = :status WHERE ID = :id", [
        "id" => $this->user_id,
        "status" => $this->status
      ]);

      //* ### User successfully deleted from `Usr` table (+ other tables) ###
      $_SESSION['status'] = 'User has been successfully ' . $this->status . '!';
      header($this->redirection);
      exit();
    } catch (PDOException $e) {
      // Handle any unexpected errors
      $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
      echo "Error: " . $e->getMessage();
      header($this->redirection);
      exit();
    }
  }
} // Status class

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
   * Summary of fetch_users_roles
   * * Fetch user role using `user_id`
   * @param int $user_id
   * @return array
   */
  public function fetch_user_role($user_id)
  {
    try {
      $user_role = $this->db->query("SELECT * FROM Usr_Roles WHERE Usr_ID = :id", [
        'id' => $user_id
      ]);
      return $user_role[0];
    } catch (Exception $e) {
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
}  // Fetch class

class SignIn
{
  private string $identifier;
  private string $password;
  private Database $db;
  public function __construct($identifier = null, $password = null)
  {
    $this->identifier = $identifier;
    $this->password = $password;
    $this->db = new Database('../../');
  }

  /**
   * Summary of signIn
   * * Main SignIn class func
   * @return void
   */
  public function signIn()
  {
    try {
      session_start();
      $user = $this->is_valid_user();
      if ($user === null) {  // Check if user exists
        $_SESSION['status'] = "User not found!";
        header("Location: ../Views/login.php");
        exit();
      }

      // Verify if the user is suspended or not
      is_suspend($user['ID'], 'Location: ../Views/login.php');

      // Verify the client password and assign it to the login history
      ($this->is_pass($user['Password_hash']))
        ? $this->ass_login_history($user['ID'], 'SUCCESS')
        : $this->ass_login_history($user['ID'], 'FAILED');

      $user_role = new Fetch();
      $user_role = $user_role->fetch_user_role($user['ID']);

      // Login successful - Set session variables
      $_SESSION['user_id'] = $user['ID'];
      $_SESSION['user_role'] = $user_role['Role_ID'];
      $_SESSION['status'] = "Login successful!";
      header("Location: ../Views/login.php");
    } catch (Exception $e) {
      // Handle any unexpected errors
      $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
      header("Location: ../Views/login.php");
      exit();
    }
  }

  /**
   * Summary of is_valid_user
   * * Fetch user by identifier (username or email)
   * * Return `null` or 'user array'
   * @return array | null
   */
  private function is_valid_user()
  {
    $user = $this->db->query('SELECT * FROM Usrs WHERE Email = :identifier OR Username = :identifier', [
      "identifier" => $this->identifier
    ]);
    return $user[0] ?? null;
  }

  /**
   * Summary of ass_login_history
   * * Assign login try to `login_History` table
   * * INSERT action
   * @param int $user_id
   * @param string $status
   * @return void
   */
  private function ass_login_history($user_id = null, $status = null)
  {
    $this->db->query("INSERT INTO Login_History
      (Usr_ID, IP_Address, Usr_Host, Server_Address, Server_Name, Server_Protocol, Status)
      VALUES (:user_id, :ip_address, :user_host, :server_address, :server_name, :server_protocol, :status)", [
      'user_id' => $user_id,
      'ip_address' => $_SERVER['REMOTE_ADDR'],
      'user_host' => $_SERVER['REMOTE_HOST'],
      'server_address' => $_SERVER['SERVER_ADDR'],
      'server_name' => $_SERVER['SERVER_NAME'],
      'server_protocol' => $_SERVER['SERVER_PROTOCOL'],
      'status' => $status
    ]);

    echo $user_id . '<br>';
    echo $status;

    // Force exit in `FAILED` status
    if ($status === 'FAILED') {
      $_SESSION['status'] = "Invalid password!";
      header("Location: ../Views/login.php");
      exit();
    }
  }

  /**
   * Summary of is_pass
   * * Return if the client password id valid or not
   * @param string $valid_hash_password
   * @return bool
   */
  private function is_pass($valid_hash_password = null)
  {
    return password_verify($this->password, $valid_hash_password);
  }
}  // SignIn class

/**
 * Summary of Edit_user
 * ! chmod 707 "/home/zouari_omar/Documents/Daily/Projects/AgriGO/project/public/assets/uploads"
 */
class Edit_user
{
  private $user_id;
  private $img;
  private $uploadDir;
  private Database $db;

  /**
   * Summary of __construct
   * @param int $user_id
   * @param string $img
   */
  public function __construct($user_id = null, $img = null)
  {
    $this->user_id = $user_id;
    $this->img = $img;
    $this->uploadDir = '../../public/assets/uploads/';

    // Connect to `AgriGO` DB
    $this->db = new Database('../../');
  }

  /**
   * Summary of update_user_image
   * * Exec the update for the `Images` table
   * @return mixed
   */
  private function update_user_image()
  {
    $uploadPath = $this->uploadDir . basename($this->img['name']);

    // Attempt to move the uploaded file to the desired directory
    if (!move_uploaded_file($this->img['tmp_name'], $uploadPath)) {
      $_SESSION['status'] = "Failed to upload the image. Please try again.";
      return null;
    }

    // Get the image type
    $type = $this->img['type'];

    // Insert image details into the database
    $this->db->query('INSERT INTO Images (Name, Path, Type) VALUES (:name, :path, :type)', [
      'name' => $this->img['name'],
      'path' => $uploadPath,
      'type' => $type
    ]);

    // Retrieve the last inserted ID
    $imageId = $this->db->query('SELECT LAST_INSERT_ID() AS id LIMIT 1')[0]['id'];

    // Return the Image_ID if insertion is successful, or null if it fails
    return $imageId ?: null;
  }

  /**
   * Summary of update_user
   * * Exec the update for the `Usr` table
   * @return void
   */
  private function update_user()
  {
    // Execute the update for the `Usr` table
    $this->db->query("UPDATE Usrs SET Email = :Email WHERE ID = :id", [
      "Email" => $_POST['email'],
      "id" => $this->user_id
    ]);
  }

  /**
   * Summary of update_user_profile
   * * Exec the update for the `Usr_Profile` table
   * @return void
   */
  private function update_user_profile()
  {
    $img_id = $this->update_user_image();

    // Base SQL and parameters
    $sql = "UPDATE Usr_Profile SET 
    First_Name = :First_Name,
    Last_Name = :Last_Name,
    Tel = :Tel,
    Sex = :Sex,
    State = :State,
    Address = :Address,
    Zip_Code = :Zip_Code,
    About = :About";

    $params = [
      "First_Name" => $_POST['firstName'],
      "Last_Name" => $_POST['lastName'],
      "Tel" => $_POST['tel'],
      "Sex" => $_POST['sex'],
      "State" => $_POST['state'],
      "Address" => $_POST['address'],
      "Zip_Code" => $_POST['zipCode'],
      "About" => $_POST['about'],
      "id" => $this->user_id
    ];

    // Include Image_ID only if it's not `null`
    if ($img_id !== null) {
      $sql .= ", Image_ID = :Image_ID";
      $params["Image_ID"] = $img_id;
    }

    $sql .= " WHERE Usr_ID = :id";

    // Execute the query
    $this->db->query($sql, $params);
  }

  /**
   * Summary of update_all
   * * Main Edit_user class func
   * * Exec the update for all users tables
   * @return void
   */
  public function update_all()
  {
    try {
      $this->update_user();
      $this->update_user_profile();
      $_SESSION['status'] = "Your Profile successfully Edit it!";
      header('Location: ../Views/pages-account-settings-account.php?id=' . $this->user_id);
    } catch (PDOException $e) {
      // Handle any unexpected errors
      $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
      echo "Error: " . $e->getMessage();
      header('Location: ../Views/pages-account-settings-account.php?id=' . $this->user_id);
      exit();
    }
  }
}  // Edit_user class