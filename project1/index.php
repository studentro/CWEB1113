

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title></title>
</head>
<body>
<div class="container">
	<h2>Basic Table</h2>

	<?php


$action=isset($_GET['deleted']) ? $_GET['deleted'] : "";
if($action='deleted')
{
	echo"<div class='alert-success'>record was deleted</div>";



}

?>
<table class="table">
	<head>
		<tr>

		<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Student Email</th>
			<th>Student Phone</th>
			<th>Action</th>
		</tr>
	</head>
	<tbody>
		<div class="container">
		<div>

		<?php
	
// include database connection
include"config/database.php";
//echo $id;
//read current records data
try
{
	//prepare select query 
	$query= "SELECT id, First_Name, Last_Name, Student_Email, Student_Phone from students order by id desc";
	$stmt=$con->prepare($query);
	
	//execute our query 
	$stmt->execute();
	$row=$stmt-> fetch(PDO::FETCH_ASSOC);
}

catch(PDOException $e)
{
	echo"Connection error: ".$e->getMessage();
}


		//read current records data 
		try
		
		{

			// select all data
		$query="SELECT id,First_Name,Last_Name,Student_Email,Student_Phone From students ORDER by id DESC";

		$stmt=$con->prepare($query);
		$stmt->execute();
		$num=$stmt->rowcount();
		
		while ($row=$stmt->fetch(PDO :: FETCH_ASSOC)) 
		{
			extract($row);
			/* print_r($row);
			echo"</pre>"; */

			/* $FirstName=$row["First_Name"];
			echo $FirstName ; */
		

		echo"<tr>";
			echo"<td>{$id}</td>"	;
			echo"<td>{$First_Name}</td>"	;
			echo"<td>{$Last_Name}</td>"	;
			echo"<td>{$Student_Email}</td>"	;
			echo"<td>{$Student_Phone}</td>"	;
			echo"<td>hi</td>";
			
		echo"</tr>";
		}

		}
		catch(PDOException $e)
{
	echo"Connection error: ".$e->getMessage();
}

		
		?> 

 		
	</tbody>
	
</table>
	

</div>
</body>
</html>