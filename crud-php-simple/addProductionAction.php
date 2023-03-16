<html>
<head>
	<title>Add Product</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$pname = mysqli_real_escape_string($mysqli, $_POST['pname']);
	$desc = mysqli_real_escape_string($mysqli, $_POST['desc']);
	$type = mysqli_real_escape_string($mysqli, $_POST['type']);
	$cost = mysqli_real_escape_string($mysqli, $_POST['cost']);
	$sellprice = mysqli_real_escape_string($mysqli, $_POST['sellprice']);
	$quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
	$vendorid = mysqli_real_escape_string($mysqli, $_POST['vendorid']);
    $eid = mysqli_real_escape_string($mysqli, $_POST['eid']);

		
	// Check for empty fields
	if (empty($pname) || empty($desc) || empty($type) || empty($cost) || empty($sellprice) || empty($quantity) || empty($vendorid)) {
		if (empty($pname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($desc)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		if (empty($type)) {
			echo "<font color='red'>Type field is empty.</font><br/>";
		}
		if (empty($cost)) {
			echo "<font color='red'>Cost field is empty.</font><br/>";
		}
		if (empty($sellprice)) {
			echo "<font color='red'>Sell price field is empty.</font><br/>";
		}
		if (empty($quantity)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
        if (empty($vendorid)) {
			echo "<font color='red'>Vendor field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO products (`product_name`, `description`,`product_type`,`cost`,`sell_price`,`quantity`,`vendor_id`,`added_by`) 
		VALUES ('$pname', '$desc','$type','$cost','$sellprice','$quantity','$vendorid','$eid')");
        
        // Display success message
		echo "<p><font color='green'>Product data added successfully!</p>";
		echo "<a href='welcome.php'>View Result</a>";
	}
}
?>
</body>
</html>
