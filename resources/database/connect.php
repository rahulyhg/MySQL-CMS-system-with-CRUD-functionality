<?php
session_start();
ob_start();
/*
* File: connect.php
* 
* Date: 13.11.2107.
* Copyright (c) TipoIT 2017
*
* This file is a database connection
*
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$db		  = "alphacrm";

$connection = mysqli_connect($hostname, $username, $password, $db);

$dbConn = true;

if (!$connection) {
	echo "Error!";

	$dbConn = false;
}

?>