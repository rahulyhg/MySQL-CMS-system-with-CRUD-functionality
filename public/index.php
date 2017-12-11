<?php
/*
* File: index.php
*
* Date: 13.11.2107.
* Copyright (c) TipoIT 2017
*
* Index file
*
*/
require("../resources/database/connect.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>create tables in alphacrm database</title>
	<style type="text/css">
		body{
			font-family: tahoma, sans-serif;
		}

		.buttonBox{
			margin: 40px;
		}

		a{
			text-decoration: none;
		}

		.btnMain{
			cursor: pointer;
			width: 240px;
			height: 40px;
			background-color: #000;
			color: #fff;
			border: 0;
			font-size: 16px;
		}

		.btnSpo{
			cursor: pointer;
			width: 240px;
			height: 40px;
			background-color: #0066ff;
			color: #fff;
			border: 0;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="#errorBox">
			<?php
				if (isset($_SESSION['errors']) && $_SESSION['errors'] != "") {
					foreach ($_SESSION['errors'] as $error) {
						echo '<p style="color:#e60000;margin:40px;">';
						echo($error);
						echo '</p>';

					}
				}

				unset($_SESSION['errors']);
			?>
		</div>
		<br>
		<div id="#msgBox">
			<?php
				if (isset($_SESSION['success']) && $_SESSION['success'] != "") {
					foreach ($_SESSION['success'] as $msg) {
						echo '<p style="color:#009900;margin:40px;">';
						echo($msg);
						echo '</p>';
					}
				}

				unset($_SESSION['success']);
			?>
		</div>
		<div class="buttonBox">
			<a href="tableCreateComp.php">
				<button class="btnMain">CREATE COMPANY TABLE</button>
			</a><br><br>	
			<a href="deleteCompTable.php">
				<button class="btnMain">DELETE COMPANY TABLE</button>
			</a><br><br>
			<a href="tableCreatePerson.php">
				<button class="btnMain">CREATE EMPLOYEE TABLE</button>
			</a><br><br>
			<a href="deletePersonTable.php">
				<button class="btnMain">DELETE EMPLOYEE TABLE</button>
			</a><br><br>
			<a href="CompanyTbls/">
				<button class="btnMain">LIST COMPANY TABLES</button>
			</a><br><br>
			<a href="PersonsTbls/">
				<button class="btnMain">LIST PERSONS TABLES</button>
			</a>
		</div>
	
		<div class="buttonBox">
			<a href="Inserts/insertCompany.php">
				<button class="btnSpo">INSERT COMPANY DATA</button>
			</a><br><br>	
			<a href="Inserts/insertEmployee.php">
				<button class="btnSpo">INSERT EMPLOYEE DATA</button>
			</a>
		</div>
	</div>
</body>
</html>