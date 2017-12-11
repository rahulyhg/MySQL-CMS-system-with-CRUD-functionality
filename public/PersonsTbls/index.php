<?php
/*
* File: PersonsTbls/index.php
* By: 	https://www.linkedin.com/in/darko-borojevi%C4%87-54b03135/
* Date: 13.11.2107.
* Copyright (c) TipoIT 2017
*
* Person tables
*
*/
require("../../resources/database/connect.php");

spl_autoload_register(function ($class) {
    include '../includes/' . $class . '.php';
});

?>
<!DOCTYPE html>
<html>
<head>
	<title>persons tables in alphacrm database</title>
	<style type="text/css">
		body{
			font-family: tahoma, sans-serif;
		}

		#links{
			margin: 40px;
		}

		a{
			text-decoration: none;
		}

		button{
			cursor: pointer;
			height: 40px;
			background-color: #000;
			color: #fff;
			border: 0;
			font-size: 16px;
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
	<div id="wrapper">

		<div id="links">
			<?php
				//lists company tables
				$showComTables ="SHOW TABLES FROM alphacrm LIKE '%emp%'";

				$query_one = mysqli_query($connection, $showComTables);

				if (!$query_one) {

					$_SESSION['errors'][] = "Query failed! ".mysqli_error($connection)."";
					die(header("Location:../index.php"));
					
				}

				if ($query_one) {

					while ($row = mysqli_fetch_array($query_one)) {
						echo '<div>';
						echo '<a href="../EmpTblsData/'.$row[0].'.php">'.$row[0].'</a><hr>';
						echo '</div>';
					}
					
				}

				// Free result set
				mysqli_free_result($query_one);

				mysqli_close($connection);
			?>
		</div>

		<div id="link">
			<?php
				$nav = new Navigation();
			?>
		</div>

	</div>
</body>
</html>