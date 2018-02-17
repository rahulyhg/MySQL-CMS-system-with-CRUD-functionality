<?php
/**
*navigation class
*/
namespace App\Nav;

class Navigation
{	


	function __construct(){	

		$homepage 	= "http://localhost:8080/git/PHP-example-sql-join/MySQL-CMS-system-with-CRUD-functionality/public/index.php";
		$deleteP 	= "http://localhost:8080/git/PHP-example-sql-join/MySQL-CMS-system-with-CRUD-functionality/public/deletePersonTable.php";
		$deleteC 	= "http://localhost:8080/git/PHP-example-sql-join/MySQL-CMS-system-with-CRUD-functionality/public/deleteCompTable.php";

		$navigation = '
		<a href="'.$homepage.'">homepage</a><br>
		<a href="'.$deleteP.'">delete Persons</a><br>
		<a href="'.$deleteC.'">delete Companies</a>';

		echo $navigation;
		
	}

}


?>