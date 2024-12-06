<?php
/**
 * @file face-signIn.php
 * @author zouari_omar <zouariomar20@gmail.com>
 */
//? Include declaration part
include_once '../Helpers/__include__.php';
include_once '../Helpers/custom.php';

// Get user id
$user_id = $_GET['id'];

// Verify if the user is suspended or not
is_suspend($user_id, 'Location: ../Views/login.php');

// Sign-in and assign this login to `login_history`
$exec = new SignIn('', '');
$exec->ass_login_history($user_id, 'SUCCESS');

// Fetch user role
$user_role = new Fetch();
$user_role = $user_role->fetch_user_role($user_id);

// Login successful - Set session variables
session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['user_role'] = $user_role['Role_ID'];
$_SESSION['status'] = "Login successful!";
header("Location: ../Views/login.php");
exit();