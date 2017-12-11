<?php
/*
* File: tableCreate.php
* 
* Date: 13.11.2107.
* Copyright (c) TipoIT 2017
*
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

		$tableName = mysqli_real_escape_string($connection, "comp_".$_GET['dataBase']);

		if (strlen($tableName) > 20) {
			$_SESSION['errors'][] = "The name of your table is too long! Please keep it under 20 characters and try again!";

			die(header("Location:index.php"));
		}else{

			//creates company table
			$createComTable  = "CREATE TABLE alphacrm.".$tableName."(";
			$createComTable .="companyID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,";
			$createComTable .="tableType SMALLINT(10) NOT NULL DEFAULT 1,";
			$createComTable .="tableName VARCHAR(255) NOT NULL,";
			$createComTable .="preName VARCHAR(250) NULL,";
			$createComTable .="name VARCHAR(250) NOT NULL,";
			$createComTable .="regType VARCHAR(150) NULL,";
			$createComTable .="streetA VARCHAR(150) NULL,";
			$createComTable .="streetB VARCHAR(150) NULL,";
			$createComTable .="streetC VARCHAR(150) NULL,";
			$createComTable .="town VARCHAR(150) NULL,";
			$createComTable .="county VARCHAR(150) NULL,";
			$createComTable .="postcode VARCHAR(150) NULL,";
			$createComTable .="country VARCHAR(250) NULL,";
			$createComTable .="monthRevenue INT (25) NULL,";
			$createComTable .="monthExpense INT (25) NULL,";
			$createComTable .="monthProfit INT(25) NOT NULL";
			$createComTable .=")";
			//insert table type 1
			$insertTableType = "INSERT INTO $tableName (tableName) VALUES ('$tableName')";

			$query_one 		= mysqli_query($connection, $createComTable);
			$query_two 		= mysqli_query($connection, $insertTableType);

				if (!$query_one) {

					$_SESSION['errors'][] = "Query 1 failed! ".mysqli_error($connection)."";
					die(header("Location:index.php"));
					
				}

				
				if (!$query_two) {

					$_SESSION['errors'][] = "Query 2 failed! ".mysqli_error($connection)."";
					die(header("Location:index.php"));
					
				}
				

				if ($query_one && $query_two) {
					$_SESSION['success'][] = "You have created table ".$tableName." successefully!";

					
					$fileName = "CompTblsData/".$tableName.".php";

					$createFile = fopen($fileName, "x+");

					$string = "<?php 
					echo '<button>show table data</button>';
					?>";

					$writeFile = fwrite($createFile, $string);

					if (!$createFile) {
						$_SESSION['errors'][] = "Can't create file ".$fileName."!";
						die(header("Location:index.php"));
					}
					
					header("Location:index.php");
				}

		}//end if strlen

	}//end get dataBase

}//end dbConn
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Company tables</title>
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



