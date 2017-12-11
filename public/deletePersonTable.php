<?php
/*
* File: deletePersonTable.php
* 
* Date: 13.11.2107.
* Copyright (c) TipoIT 2017
*
* delete persons table
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

			$_SESSION['errors'][] = "You can't delete an empty table name!";
			
			die(header("Location:index.php"));

		}

		$tableName = mysqli_real_escape_string($connection, $_GET['dataBase']);

		if (strlen($tableName) > 20) {
			$_SESSION['errors'][] = "The name of your table is too long! Please keep it under 20 characters and try again!";

			die(header("Location:index.php"));
		}else{

			//deletes person table
			$deleteTb = "DROP TABLE IF EXISTS ".$tableName."";
			
			$query_one = mysqli_query($connection, $deleteTb);

				if (!$query_one) {
					$_SESSION['errors'][] = "Query failed! ".mysqli_error($connection)."";
					die(header("Location:index.php"));
				}

				if ($query_one) {
					$_SESSION['success'][] = "You have deleted table ".$tableName." successefully!";
					header("Location:index.php");
				}

		}//end if strlen

	}//end get dataBase

}//end dbConn

?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Persons tables</title>
	<style type="text/css">
		body{
			font-family: tahoma, sans-serif;
		}

		#formDiv{
			margin: 40px;
			border: 1px solid #000;
			width: 60%;
			float: left;
			clear: both;
			display: block;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		.smallBtnBlue{
			background-color: #0066ff;
			color: #fff;
			border: 0;
			width: 68px;
			font-size: 14px;
			float: right;
			cursor: pointer;
			margin: 4px;
		}

		.smallBtnRed{
			background-color: #ff471a;
			color: #fff;
			border: 0;
			width: 68px;
			font-size: 14px;
			float: right;
			cursor: pointer;
			margin: 4px;

		}

		#selectionDiv{
			margin: 40px;
			border: 1px solid #000;
			clear: both;
			width: 60%;
			float: left;
			border: 2px solid #000;
			display: block;
			padding: 12px;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		input[type = text]{
			width: 320px;
			border: 1;
			font-size: 18px;
		}

		input[type = submit]{
			width: 240px;
			height: 28px;
			border: 0;
			background-color: #000;
			color: #fff;
			font-size: 18px;
			cursor: pointer;
		}

		form{
			padding: 26px;
		}

		#link{
			margin: 40px;
			float: left;
			clear: both;
			display: block;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}
	</style>
</head>
<body>
	<div id="formDiv">
		<form action="" method="GET">
			<input id="inpt" type="text" name="dataBase"><br><br>
			<input type="submit" name="sbmt" value="delete employee">
		</form>
	</div>
	<div id="selectionDiv">
		<?php
			$selection = "SHOW TABLES FROM alphacrm LIKE '%emp%'";

			$result = mysqli_query($connection, $selection);

				if (!$result) {

					$_SESSION['errors'][] = "Select Query failed! ".mysqli_error($connection)."";
					die(header("Location:../index.php"));
					
				}

				if ($result) {

					echo "<h4>Current Employees</h4><br>";

					while ($row = mysqli_fetch_array($result)) {
						echo "<p>";
						echo '
						<span class="dataNm">'.$row[0].'</span>
						<button class="smallBtnRed">remove</button>
						<button id="'.$row[0].'" class="smallBtnBlue">select</button>
						<hr>';
						echo "</p>";
					}
					
				}

				// Free result set
				mysqli_free_result($result);

				mysqli_close($connection);
		?>
	</div><br>
	
	<div id="link">
		<?php
			$nav = new Navigation();
		?>
	</div>

	<script type="text/javascript" src="assets/jquery-3.2.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//select table for removal
			$('.smallBtnBlue').click(function(){
    			var dataHtml = $(this).attr('id');
    			$('#inpt').val(dataHtml);
			});
			//remove selected table
			$('.smallBtnRed').click(function(){
    			$('#inpt').val("");
			});
		});
	</script>
</body>
</html>