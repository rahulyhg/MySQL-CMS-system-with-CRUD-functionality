<?php
/**
* Navigation class
*/
class Navigation
{	

	private $navigation = '
	<a href="http://localhost//PHP-example-sql-join/public/index.php">homepage</a><br>
	<a href="http://localhost//PHP-example-sql-join/public/deletePersonTable.php">delete Persons</a><br>
	<a href="http://localhost//PHP-example-sql-join/public/deleteCompTable.php">delete Companies</a>
	';

	function __construct()
	{

		echo $this->navigation;
		
	}

}


?>