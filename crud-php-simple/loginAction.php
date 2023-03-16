<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in a string for use in an SQL statement
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	
	// Check for empty fields
	if (empty($email) || empty($password)) {
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if (empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM employees WHERE `email` = '$email' AND `password` = '$password'");

        $row = mysqli_fetch_array($result); 
        $count = mysqli_num_rows($result);  
        // print_r($count); die;
        if($count == 1){  
            session_start();
            $_SESSION= $row;
            session_write_close();

            echo "<h1><center> Login successful </center></h1>";  
            header("location: welcome.php");

        }  
        else{  
            echo "<h1> Login failed. Invalid email or password.</h1>";  
        }   
	
	}
}
