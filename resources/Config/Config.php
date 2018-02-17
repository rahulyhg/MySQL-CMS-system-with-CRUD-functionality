<?php
/*
* config class
**/
namespace App\Conf;

class Config
{
	
	function __construct()
	{
		session_start();
		ob_start();
		error_reporting(E_ALL);
		//ini_set('display_errors', 1);
	}
}

?>