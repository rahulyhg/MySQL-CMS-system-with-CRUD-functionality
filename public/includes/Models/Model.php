<?php
/**
*model class
*/
namespace App\Mod;

//include company object
require('../includes/Objects/Company.php');

class Model{

	public function showAllCompanyTables(){

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

		$query = "SHOW TABLES FROM alphacrm LIKE '%comp%'";

		$result = mysqli_query($connection, $query);

		if (!$query) {

			if (isset($_SESSION['errors'])) {
				unset($_SESSION['errors']);
			}

			$_SESSION['errors'] = array();

			$_SESSION['errors'][] = "Show company tables Query failed!";
			die(header("Location:../index.php"));
					
		}else{

			while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
				echo '<a href="../CompTblsData/'.$row[0].'.php">'.$row[0].'</a><hr>';
			}
		}

		//Free result set
		mysqli_free_result($result);
		//close connection
		mysqli_close($connection);

	}

	public function showCompanyTablesByType($table, $type){

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

		$query = "SELECT * FROM '{$table}' LIKE '{$type}'";

		$result = mysqli_query($connection, $query);

        $CompanyArr = array();
        //fetching results
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $id         = $row[0];
            $name       = $row[1];
            $address    = $row[2];
            $revenue    = $row[3];
            $expenses   = $row[4];
            //create objects and store them in array
            $company = new Company($id, $name, $address, $revenue, $expenses);
            array_push($CompanyArr, $company);
        }
        //Free result set
		mysqli_free_result($result);
        //close connection and return companies
        mysqli_close($connection);
        return $CompanyArr;
	}

}


?>