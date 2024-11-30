<?php
//* NOTE: Del the user using the `ID` (GET Request)
//? Include declaration part
include_once '../../../vendor/autoload.php';  // Load Composer autoload
include_once "../../conf/database.php";

class Status
{
  private int $user_id;
  private int $admin_id;
  private string $status;
  private Database $db;
  public function __construct($admin_id = null, $user_id = null, $status = 'ACTIVE')
  {
    $this->admin_id = $admin_id;
    $this->user_id = $user_id;
    $this->status = $status;
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

      //* ### User successfully deleted from `Usr` table (+ other tables)  ###
      $_SESSION['status'] = 'User has been successfully ' . $this->status . '!';
      header('Location: ../Views/dashboard.php?id=' . $this->admin_id);
      exit();
    } catch (PDOException $e) {
      // Handle any unexpected errors
      $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
      echo "Error: " . $e->getMessage();
      header('Location: ../Views/dashboard.php?id=' . $this->admin_id);
      exit();
    }
  }
}  // Status class

// Execute the Status obj
$exec = new Status($_GET['admin_id'], $_GET['id'], $_GET['status']);
$exec->set_usr_status();

