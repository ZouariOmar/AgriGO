<?php
//? Include declaration part
include '../vendor/autoload.php';  // Load Composer autoload
include "conf/database.php";
$db = new Database('.');
echo "<br>Done With DB :)";