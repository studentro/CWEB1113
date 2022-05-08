<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		.Error {color: #FF0000;}
	</style>
	<title>PDO: Create a Record</title>
</head>
<body>
<div class="container">
	<div class="page-header">
		<h1>Create</h1>
	</div>
	<?php

	$CustomerName="";
	$CustomerNameErr="";
	$ContactName="";
	$ContactNameErr="";
	$Address="";
	$AddressErr="";
	$City="";
	$CityErr="";
	$PostalCode="";
	$PostalCodeErr="";
	$Country="";
	$CountryErr="";
	$isCustomerIDValid=false;
	$isCustomerNameValid=false;
	$isContactNameValid=false;
	$isAddressValid=false;
	$isCityValid=false;
	$isPostalCodeValid=false;
	$isCountryValid=false;


	if ($_SERVER['REQUEST_METHOD']=="POST") 
	{
		
		if (empty($_POST['customername'])) 
		{
			$CustomerNameErr="Customer name is required";
		}
		else 
		{
			$CustomerName=sanitize_input($_POST['customername']);
			
			if (!preg_match("/^[a-zA-Z-' ]*$/", $CustomerName))
			{

				$CustomerNameErr="Only letters and white space allowed";
				$isCustomerNameValid=false;
			}
			else
			{
				$isCustomerNameValid=true;

			}
		}

		if (empty($_POST['contactname'])) 
		{
			$ContactNameErr="Contact name is required";
		}
		else 
		{
			$ContactName=sanitize_input($_POST['contactname']);
			
			if (!preg_match("/^[a-zA-Z-' ]*$/", $ContactName))
			{

				$ContactNameErr="Only letters and white space allowed";
				$isContactNameValid=false;
			}
			else
			{
				$isContactNameValid=true;
			}
		}

		if($isCustomerNameValid && $isContactNameValid )
  {

 

            include"config/database.php";
            try
            {
                // insert query
                $query="INSERT INTO customers SET CustomerName =:customername, ContactName =:contactname, Address=:address,City=:city, PostalCode=:postalcode, Country=:country";

 

                $stmt=$con->prepare($query);

 

                $CustomerName=htmlspecialchars(strip_tags($_POST['customername']));
                $ContactName=htmlspecialchars(strip_tags($_POST['contactname']));
                $Address=htmlspecialchars(strip_tags($_POST['address']));
                $City=htmlspecialchars(strip_tags($_POST['city']));
                $PostalCode=htmlspecialchars(strip_tags($_POST['postalcode']));
                $Country=htmlspecialchars(strip_tags($_POST['country']));

 

                $stmt->bindParam(':customername',$CustomerName);
                $stmt->bindParam(':contactname',$ContactName);
                $stmt->bindParam(':address',$Address);
                $stmt->bindParam(':city',$City);
                $stmt->bindParam(':postalcode',$PostalCode);
                $stmt->bindParam(':country',$Country);



 


 

                if($stmt->execute())
                {
                        echo '<div class="alert alert-success" role="alert"> Record was saved.</div>';
                }
                else
                {
                     echo '<div class="alert alert-warning" role="alert">Unable to save record.</div>';
                }
                

 

            }
            catch(PDOException $e)
            {
                    echo"Error".$e->getMessage();
            }

 


  }

		if (empty($_POST['address'])) 
		{
			$AddressErr="Address is required";
		}
		else 
		{
			$Address=sanitize_input($_POST['address']);
			
			if (!preg_match("/^w+[+.w-]*@([w-]+.)*w+[w-]*.([a-z]{2,4}|d+)$/i", $Address))
			{

				//$EmailErr="Only letters and white space allowed";


			}

		}
		if (empty($_POST['city'])) 
		{
			$CityErr="City is required";
		}
		else 
		{
			$City=sanitize_input($_POST['city']);
			
			if (!preg_match("/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})$/", $City))
			{

				$CityErr="Only letters and white space allowed";
			}
		}
		if (empty($_POST['postalcode']))
		{
			$PostalCodeErr="Postal code is required";
		}
		else
		{
			$PostalCode=sanitize_input($_POST['postalcode']);

			if (!preg_match("/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})$/",$PostalCode))
			{
				$PostalCodeErr="Only numbers allowed";
			}
		}
		if (empty($_POST['country']))
		{
			$CountryErr="Country is required";
		}
		else
		{
			$Country=sanitize_input($_POST['country']);

			if(!preg_match("/^[a-zA-Z-' ]*$/",$Country))
			{
				$CountryErr="Only letters allowed";
			}
		}
	}


	function sanitize_input($data) {
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;


	}
	

		include"config/database.php";

	?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<table class="table table-striped">
			<tr>
				<td>Customer Name</td>
				<td>
					<input type="text" name="customername" class="form-control" value="<?php echo $CustomerName; ?>">
					<span class ="Error"><?php echo $CustomerNameErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>Contact Name</td>
				<td>
					<input type="text" name="contactname" class="form-control"value="<?php echo $ContactName; ?>">
					<span class="Error"><?php echo $ContactNameErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>
					<input type="text" name="address" class="form-control">
					<span class ="Error"><?php echo $AddressErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>City</td>
				<td>
					<input type="text" name="city" class="form-control">
					<span class ="Error"><?php echo $CityErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>Postal Code</td>
				<td>
					<input type="text" name="postalcode" class="form-control">
					<span class ="Error"><?php echo $PostalCodeErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>
					<input type="text" name="country" class="form-control">
					<span class ="Error"><?php echo $CountryErr; ?></span>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="Submit" value="Save" name="Submit" class="btn btn-primary">
				<a href="customers.php" class="btn btn-danger">Go Back</a>
			</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>