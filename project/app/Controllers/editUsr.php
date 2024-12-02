<?php
/**
 * @file editUsr.php
 * @author zouari_omar <zouariomar20@gmail.com>
 */

//? Include declaration part
include_once '../Helpers/__include__.php';

session_start(); // Start the session to manage status messages
$user_id = $_SESSION['id'] ?? null;
unset($_SESSION['id']);
$editUsr = new Edit_user($user_id, $_FILES['image']);
$editUsr->update_all();