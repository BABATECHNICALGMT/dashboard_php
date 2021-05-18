<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'babaTech');

$dbserver = constant('DB_HOST');
$dbuser = constant('DB_USER');
$dbpass = constant('DB_PASS');
$dbname = constant('DB_NAME');

$con = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

if (!$con) {
	die('Sorry');
}

?>