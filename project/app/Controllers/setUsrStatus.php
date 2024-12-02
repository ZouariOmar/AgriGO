<?php
/**
 * @file setUsrStatus.php
 * @author zouari_omar <zouariomar20@gmail.com>
 */

//? Include declaration part
include_once '../Helpers/__include__.php';

// Execute the Status obj
$exec = new Status($_GET['admin_id'], $_GET['id'], $_GET['status']);
$exec->set_usr_status();