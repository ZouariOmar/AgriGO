<?php
//! chmod 707 "/home/zouari_omar/Documents/Daily/Projects/AgriGO/project/public/assets/uploads"

//? Include declaration part
include_once '../../../vendor/autoload.php';  // Load Composer autoload
include_once "../../conf/database.php";

class Edit_user
{
  private $user_id;
  private $img;
  private $uploadDir;
  private Database $db;

  /**
   * Summary of __construct
   * @param int $user_id
   * @param mixed $img
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

session_start(); // Start the session to manage status messages
$user_id = $_SESSION['id'] ?? null;
unset($_SESSION['id']);
$editUsr = new Edit_user($user_id, $_FILES['image']);
$editUsr->update_all();