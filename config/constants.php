<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Start Session
session_start();

// creat constants
define('SITEURL', 'http://localhost/diet/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ass_web');

$connection = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($connection)); //connect db
$db_select = mysqli_select_db($connection, DB_NAME) or die(mysqli_error($connection)); //select db
