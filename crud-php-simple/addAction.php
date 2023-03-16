<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$role = mysqli_real_escape_string($mysqli, $_POST['role']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$salary = mysqli_real_escape_string($mysqli, $_POST['salary']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
		
	// Check for empty fields
	if (empty($name) || empty($password) || empty($email) || empty($role) || empty($gender) || empty($address)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($password)) {
			echo "<font color='red'>password field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if (empty($role)) {
			echo "<font color='red'>Please select at least one role.</font><br/>";
		}
		if (empty($gender)) {
			echo "<font color='red'>Please select gender.</font><br/>";
		}
		if (empty($address)) {
			echo "<font color='red'>address field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO employees (`name`, `email`,`password`,`role`,`gender`,`salary`,`address`) 
		VALUES ('$name', '$email','$password','$role','$gender','$salary','$address')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
