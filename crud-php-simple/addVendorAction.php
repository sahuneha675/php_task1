<html>
<head>
	<title>Add Vender</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);

    // Check for empty fields
	if (empty($name)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO vendor (`name`) 
		VALUES ('$name')");
		
		// Display success message
		echo "<p><font color='green'>Vendor Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
