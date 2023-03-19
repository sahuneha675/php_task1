<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM employees ORDER BY id DESC");


// Fetch data in descending order (lastest entry first)
$productresult = mysqli_query($mysqli, "SELECT p.pid,p.product_name,p.description,p.product_type,p.cost,p.sell_price,p.quantity, v.name as vname, emp.name as ename 
FROM `products` p 
LEFT JOIN vendor v ON v.vid=p.vendor_id 
LEFT JOIN employees emp ON emp.id=p.added_by");


// Retrieve search term from form or URL
$search_term = $_GET['search'];

// Construct SQL query
$sql = "SELECT * FROM employees WHERE name LIKE '%$search_term%'";

// Execute query
$searchresult = mysqli_query($mysqli, $sql);

// Display results
// if (mysqli_num_rows($searchresult) > 0) {
//     while ($row = mysqli_fetch_assoc($searchresult)) {
//         echo $row['name'] . "<br>";
//     }
// } else {
//     echo "No results found.";
// }

?>

<html>
<head>	
	<title>Homepage</title>
	<p>
		<a href="login.php">Login</a>
	</p>
</head>

<body>
	<h2>Homepage</h2>
	<p>
		<a href="add.php">Add Employee</a>
	</p>

	<p>
		<a href="addvendor.php">Add Vender</a>
	</p>
	<p>
	<form action="index.php" method="GET">
		<input id="search" name="search" type="text" placeholder="Type here">
		<input id="submit" type="submit" value="Search">
	</form>
    </p>
	<h4>Employees</h4>
	<table width='80%' border=0>
	<thead>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Email</strong></td>
			<td><strong>Password</strong></td>
			<td><strong>Name</strong></td>
			<td><strong>Role</strong></td>
			<td><strong>Gender</strong></td>
			<td><strong>Salary</strong></td>
			<td><strong>Address</strong></td>
			<td><strong>Action</strong></td>
		</tr>
	</thead>
	<tbody>

		<?php
		// Fetch the next row of a result set as an associative array

		if(!empty($searchresult)){
			while ($res = mysqli_fetch_assoc($searchresult)) {
				if($res['gender'] == 'M'){
					//blue
					$gender = "<td style='color:blue'>".$res['gender']."</td>";
				}else{
					//red
					$gender = "<td style='color:red'>".$res['gender']."</td>";
				}
				
				$salary = $res["salary"];
				if(is_null($salary)) {
					$salary = "<span style='color:red;'>NULL</span>";
				} else {
				$total_sal += $salary;
				$count_sal++;}

				echo "<tr>";
				echo "<td>".$res['email']."</td>";	
				echo "<td>".$res['password']."</td>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['role']."</td>";
				echo $gender;
				echo "<td>".$salary."</td>";
				echo "<td>".$res['address']."</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
				<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			}
		}else{
			while ($res = mysqli_fetch_assoc($result)) {

				if($res['gender'] == 'M'){
					//blue
					$gender = "<td style='color:blue'>".$res['gender']."</td>";
				}else{
					//red
					$gender = "<td style='colores['salary']r:red'>".$res['gender']."</td>";
				}

				$salary = $res["salary"];

				if(is_null($salary)) {
					$salary = "<span style='color:red;'>NULL</span>";
				} else {
					$total_sal += $salary;
					$count_sal++;
				}

				echo "<tr>";
				echo "<td>".$res['email']."</td>";	
				echo "<td>".$res['password']."</td>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['role']."</td>";
				echo $gender;
				echo "<td>".$salary."</td>";
				echo "<td>".$res['address']."</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
				<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			}
		}
		?>
  		</tbody>
	</table>
	<?php 
	# calculate & display average salary
	if($count_sal > 0) {
		$avg_sal = $total_sal / $count_sal;
		echo "<b>Average Salary: ". $avg_sal ."</b>";
	}
	?>
	<hr>
	<h4>Products</h4>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>ID</strong></td>
			<td><strong>Name</strong></td>
			<td><strong>Description</strong></td>
			<td><strong>Type</strong></td>
			<td><strong>Cost</strong></td>
			<td><strong>Sell price</strong></td>
			<td><strong>Quantity</strong></td>
			<td><strong>Vendor Name</strong></td>
            <td><strong>Added by employee</strong></td>

		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($resp = mysqli_fetch_assoc($productresult)) {
        	echo "<tr>";
			echo "<td>".$resp['pid']."</td>";	
			echo "<td>".$resp['product_name']."</td>";
			echo "<td>".$resp['description']."</td>";
            echo "<td>".$resp['product_type']."</td>";
			echo "<td>".$resp['cost']."</td>";
			echo "<td>".$resp['sell_price']."</td>";
			echo "<td>".$resp['quantity']."</td>";
			echo "<td>".$resp['vname']."</td>";
            echo "<td>".$resp['ename']."</td>";
            echo "</tr>";

			$sell_price = $resp["sell_price"];
			$quantity = $resp["quantity"];
			$cost = $resp["cost"];
	
			$total_profit = ($sell_price-$cost)*$quantity;
			$total_profit += $total_profit;
		}
		?>
	</table>
	<?php 
	if($total_profit > 0) {
		// $avg_sal = $total_sal / $count_sal;
		echo "<b>Total Profit: ". $total_profit ."</b>";
	}
	?>
</body>
</html>
