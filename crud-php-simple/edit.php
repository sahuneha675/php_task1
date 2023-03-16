<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM employees WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$email = $resultData['email'];
$role = $resultData['role'];
$gender = $resultData['gender'];
$salary = $resultData['salary'];
$address = $resultData['address'];




?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <p>
	    <a href="index.php">Home</a>
    </p>
	
	<form name="edit" method="post" action="editAction.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>Role</td>
				<td>
					<select name="role" id="role">
					<option value="S" <?=$role == 'S' ? ' selected="selected"' : '';?>>Student</option>
					<option value="E" <?=$role == 'E' ? ' selected="selected"' : '';?>>Employee</option>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td>
				<input type="radio" id="male" name="gender" value="M"  <?php echo ($gender== 'M') ?  "checked" : "" ;  ?>>
				<label for="male">Male</label><br>
				<input type="radio" id="female" name="gender" value="F"  <?php echo ($gender== 'F') ?  "checked" : "" ;  ?>>
				<label for="female">Female</label>
				</td>
			</tr>
			<tr> 
				<td>Salary</td>
				<td><input type="text" name="salary" value="<?php echo $salary; ?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $address; ?>"></td>
			</tr>
		
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
