<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

session_start(); // Start the session to manage status messages

try {
  // Fetch user by identifier (username or email)
  $sql = 'SELECT * FROM Usrs WHERE Email = :identifier OR Username = :identifier';
  $login_user = $db->query($sql, [
    "identifier" => $_POST['identifier']
  ]);

  if (empty($login_user)) {  // Check if user exists
    $_SESSION['status'] = "User not found!";
    header("Location: ../Views/login.php");
    exit();
  }

  $user_id = $login_user[0]; // Retrieve the first (and only) result
  // Assign login_history to user in `Login_History` table (INSERT action)
  $sql_assign_history = "INSERT INTO Login_History (Usr_ID, IP_Address, Usr_Host, Server_Address, Server_Name, Server_Protocol, Status)
                      VALUES (:user_id, :ip_address, :user_host, :server_address, :server_name, :server_protocol, :status)";
  if (!password_verify($_POST['password'], $user_id['Password_hash'])) {  // Verify the password
    $db->query($sql_assign_history, [
      'user_id' => $user_id['ID'],
      'ip_address' => $_SERVER['REMOTE_ADDR'],
      'user_host' => $_SERVER['REMOTE_HOST'],
      'server_address' => $_SERVER['SERVER_ADDR'],
      'server_name' => $_SERVER['SERVER_NAME'],
      'server_protocol' => $_SERVER['SERVER_PROTOCOL'],
      'status' => 'FAILED'
    ]);
    $_SESSION['status'] = "Invalid password!";
    header("Location: ../Views/login.php");
    exit();
  }  //* ### User successfully login ###

  $db->query($sql_assign_history, [
    'user_id' => $user_id['ID'],
    'ip_address' => $_SERVER['REMOTE_ADDR'],
    'user_host' => $_SERVER['REMOTE_HOST'],
    'server_address' => $_SERVER['SERVER_ADDR'],
    'server_name' => $_SERVER['SERVER_NAME'],
    'server_protocol' => $_SERVER['SERVER_PROTOCOL'],
    'status' => 'SUCCESS'
  ]);

  // Fetch the `user role`
  $user_role_sql = "SELECT Role_ID FROM Usr_Roles WHERE Usr_ID = :user_id";
  $user_role = $db->query($user_role_sql, [
    'user_id' => $user_id['ID']
  ]);

  // Login successful - Set session variables
  $_SESSION['user_id'] = $user_id['ID'];
  $_SESSION['user_role'] = $user_role[0]['Role_ID'];
  $_SESSION['status'] = "Login successful!";
  header("Location: ../Views/login.php");
  exit();
} catch (Exception $e) {
  // Handle any unexpected errors
  $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
  header("Location: ../Views/login.php");
  exit();
}
