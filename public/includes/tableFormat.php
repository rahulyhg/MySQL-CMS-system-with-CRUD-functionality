<?php

	$file = substr($string, 75);

	$explode = explode(".", $file);

	$tableName = $explode[0];	

	
	//select and list table
	$selection = "SELECT * FROM ".$tableName."";

	$query_one = mysqli_query($connection, $selection);
	

	if (!$query_one) {

		$_SESSION['errors'][] = "Query select table ".$tableName." failed! ".mysqli_error($connection)."";
		die(header("Location:../index.php"));
		
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>list table <?php echo $tableName; ?></title>
	<style type="text/css">

		body{
			font-family: tahoma, sans-serif;
		}

		#wrapper{
			padding: 10px;
		}

		table, th, td {
    		border: 1px solid black;
    		border-collapse: collapse;
		}

		th, td {
    		padding: 4px;
    		width: 100px;
    		box-sizing: border-box;
		}

		th {
    		text-align: left;
    		width: 100px;
    		box-sizing: border-box;
    		font-size: 12px;
    		text-align: center;
		}

		table {
    		border-spacing: 2px;
		}

		table.t01 { 
    		background-color: #f1f1c1;
		}

		table.t01 th {
		    color: #fff;
		    background-color: #000;
		}	

	</style>
</head>
<body>
	<div id="wrapper">
	
	<?php
		
		if ($query_one) {

			echo '
			<table class="t01">
				<tr>
				  <th>NAME</th>
				  <th>STREET</th> 
				  <th>OFFICE</th>
				  <th>WAREHOUSE</th>
				  <th>CITY</th> 
				  <th>COUNTRY</th>
				  <th>MONTH REVENUE</th>
				  <th>MONTH EXPENSE</th> 
				</tr>
			</table>';

			while ($row = mysqli_fetch_array($query_one, MYSQLI_BOTH)) {

				echo '
				<table class="t01">
					<tr>
					  <td>'.$row['name'].'</td>
					  <td>'.$row['streetA'].'</td> 
					  <td>'.$row['streetB'].'</td>
					  <td>'.$row['streetC'].'</td>
					  <td>'.$row['town'].'</td> 
					  <td>'.$row['country'].'</td>
					  <td>'.$row['monthRevenue'].'</td>
					  <td>'.$row['monthExpense'].'</td>
					  <td>'.$row['monthProfit'].'</td>  
					</tr>
				</table>';

			}
			
		}
		

	?>
	</div>
</body>
</html>