<?php
/*
* database connection class
**/
namespace App\Conn;

class Connection
{
	
	function __construct()
	{
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$db		  = "alphacrm";

		$connection = mysqli_connect($hostname, $username, $password, $db);

		$dbConn = true;

		if (!$connection) {
			die("Error in connection!");
			$dbConn = false;
		}
	}
}

?>