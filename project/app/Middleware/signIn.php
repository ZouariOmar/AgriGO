<?php
/**
 * @file signIn.php
 * @author zouari_omar <zouariomar20@gmail.com>
 */

//? Include declaration part
include_once '../Helpers/__include__.php';

$exec = new SignIn($_POST['identifier'], $_POST['password']);
$exec->signIn();