<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<h2>Add Data</h2>
	<p>
		<a href="index.php">Home</a>
	</p>

	<form action="addAction.php" method="post" name="add">
		<table width="25%" border="0">
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Role</td>
				<td>
					<select name="role" id="role">
					<option value="S">Student</option>
					<option value="E">Employee</option>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td>
				<input type="radio" id="male" name="gender" value="M">
				<label for="male">Male</label><br>
				<input type="radio" id="female" name="gender" value="F">
				<label for="female">Female</label>
				</td>
			</tr>
			<tr> 
				<td>Salary</td>
				<td><input type="text" name="salary"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

