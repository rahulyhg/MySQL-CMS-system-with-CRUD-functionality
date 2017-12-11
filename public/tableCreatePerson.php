<?php
/*
* File: tableCreate.php
* 
* Date: 13.11.2107.
* Copyright (c) TipoIT 2017
*
* This file creates tables in alphacrm database
*
*/
require("../resources/database/connect.php");

spl_autoload_register(function ($class) {
    include 'includes/' . $class . '.php';
});

if ($dbConn = true) {

	$_SESSION['errors'] = array();
	$_SESSION['success'] = array();

	if (isset($_GET['sbmt'])) {

		if ($_GET['dataBase'] == "") {

			$_SESSION['errors'][] = "You can't leave the table field empty!";
			
			die(header("Location:index.php"));

		}

		$tableName = mysqli_real_escape_string($connection, "emp_".$_GET['dataBase']);

		if (strlen($tableName) > 20) {
			$_SESSION['errors'][] = "The name of your table is too long! Please keep it under 20 characters and try again!";

			die(header("Location:index.php"));

		}else{

			//creates person table
			$createPersonTable 	= "CREATE TABLE alphacrm.".$tableName."(";
			$createPersonTable .="personID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,";
			$createPersonTable .="tableType SMALLINT(10) NOT NULL DEFAULT 2,";
			$createPersonTable .="tableName VARCHAR(255) NOT NULL,";
			$createPersonTable .="firstName VARCHAR(250) NOT NULL,";
			$createPersonTable .="lastName VARCHAR(250) NULL,";
			$createPersonTable .="CompName VARCHAR(250) NULL,";
			$createPersonTable .="monthRevenue INT(25) NULL,";
			$createPersonTable .="monthSalary INT(25) NULL,";
			$createPersonTable .="monthProfit INT(25) NULL";
			$createPersonTable .=")";
			//insert table type 1
			$insertTableType = "INSERT INTO $tableName (tableName) VALUES ('$tableName')";

			$query_one = mysqli_query($connection, $createPersonTable);
			$query_two = mysqli_query($connection, $insertTableType);

				if (!$query_one) {

					$_SESSION['errors'][] = "Query 1 failed! ".mysqli_error($connection)."";
					die(header("Location:index.php"));
					
				}

				if (!$query_two) {

					$_SESSION['errors'][] = "Query 2 failed! ".mysqli_error($connection)."";
					die(header("Location:index.php"));
					
				}

				if ($query_one && $query_two) {
					$_SESSION['success'][] = "You have created persons table ".$tableName." successefully!";
					header("Location:index.php");
				}

		}//end if strlen

	}//end get dataBase

}//end dbConn

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Persons tables</title>
	<style type="text/css">
		body{
			font-family: tahoma, sans-serif;
		}

		#formDiv{
			margin: 40px;
			border: 1px solid #000;
			width: 60%;
		}

		input[type = text]{
			width: 200px;
			border: 1;
			font-size: 18px;
		}

		input[type = submit]{
			width: 140px;
			height: 28px;
			border: 0;
			background-color: #000;
			color: #fff;
			font-size: 18px;
		}

		form{
			padding: 26px;
		}

		a{
			margin: 40px;
		}
	</style>
</head>


<body>
	<div id="formDiv">
		<form action="" method="GET">
			<input type="text" name="dataBase"><br><br>
			<input type="submit" name="sbmt" value="create table">
		</form>
	</div>
	<div id="link">
		<?php
			$nav = new Navigation();
		?>
	</div>
</body>
</html>