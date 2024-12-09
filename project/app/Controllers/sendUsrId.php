<?php
/**
 * @file sendUsrId.php
 * @author zouari_omar <zouariomar20@gmail.com>
 */

//? Include declaration part
include_once '../Helpers/__include__.php';

// Execute the Status obj
$exec = new Fetch();

$user = $exec->fetch_user_fi($_POST['identifier']);

session_start();
if (empty($user)) {
  $_SESSION['status'] = "Identifier Not Found: The specified identifier could not be located. Please verify and try again.";
  header('Location: ../Services/face_id_login.php');
  exit();
}
$_SESSION['id'] = $user['ID'];
header('Location: ../Services/face_id_login.php');
exit();