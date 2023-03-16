<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$role = mysqli_real_escape_string($mysqli, $_POST['role']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$salary = mysqli_real_escape_string($mysqli, $_POST['salary']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
	
	// Check for empty fields
	if (empty($name) || empty($email) || empty($role) || empty($gender) || empty($address)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
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
		
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE employees SET `name` = '$name', `email` = '$email', `role` = '$role',
		`gender` = '$gender', `salary` = '$salary', `address` = '$address' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
