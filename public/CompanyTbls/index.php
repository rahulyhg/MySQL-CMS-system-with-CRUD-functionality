<?php
/*
* File: CompanyTbls/index.php
* 
*
* Company tables listings
**/
require('../../resources/Config/Config.php');
require('../includes/Models/Model.php');
require('../includes/Navigation.php');
//starting config
$config = new App\Conf\Config;
?>
<!DOCTYPE html>
<html>
<head>
	<title>company tables in alphacrm database</title>
	<style type="text/css">
		body{
			font-family: tahoma, sans-serif;
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

		#links{
			margin: 40px;
			float: left;
			clear: both;
			display: block;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		.company-box{
			width: 40%;
			margin: 40px;
			padding: 12px;
			border: 2px solid #000;
		}
	</style>
</head>
<body>
	<div id="wrapper">

		<div class="company-box">
			<?php

				$model = new App\Mod\Model;
				//calling a method for showing all company tables
				$model->showAllCompanyTables();

			?>
		</div>

		<div id="links">
			<?php
				//calling a method for showing navigation
				$navigation = new App\Nav\Navigation;

			?>
		</div>

	</div>
</body>
</html>