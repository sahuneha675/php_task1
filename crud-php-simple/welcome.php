<?php
require_once("dbConnection.php");

## Check IP if it is inside Kean domain
if (!empty($_SERVER['HTTP_CLIENT_IP']))
   {   $ip = $_SERVER['HTTP_CLIENT_IP'];  }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
   {   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  }
else {  $ip = $_SERVER['REMOTE_ADDR'];   }

  echo "Your IP: $ip\n";
  $IPv4= explode(".",$ip);
  if (($IPv4[0] == 10) or ($IPv4[0] . "." . $IPv4[1] == "131.125") )
  { 
    echo "<br>You are from Kean Unversity.\n"; 
  }
  else  
  { 
    echo "<br>You are NOT from Kean Unversity.\n"; 
  }

echo "<br>\n";
//    include('session.php');
session_start();
if (isset($_SESSION)) {
    $data = $_SESSION;
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to the index
    session_unset();
    session_write_close();while ($res = mysqli_fetch_assoc($result)) {
    $url = "./index.php";
    header("Location: $url");
  }
}


// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT p.pid,p.product_name,p.description,p.product_type,p.cost,p.sell_price,p.quantity, v.name as vname, emp.name as ename 
FROM `products` p 
LEFT JOIN vendor v ON v.vid=p.vendor_id 
LEFT JOIN employees emp ON emp.id=p.added_by
WHERE p.added_by='".$data['id']."'");
?>

<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h4>Welcome <?php echo $data['name']; ?></h4>
      <p>Role: <?php echo $data['role']; ?></p>
      <p>Address: <?php echo $data['address']; ?></p> 
      <p>Gender: <?php echo $data['gender']; ?></p> 
      <p>Salary: <?php echo $data['salary']; ?></p> 

    <p>
		<a href="addProduct.php">Add Products</a>
	</p>
    <h4><a href = "logout.php">Sign Out</a></h4>

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
		while ($res = mysqli_fetch_assoc($result)) {
        	echo "<tr>";
			echo "<td>".$res['pid']."</td>";	
			echo "<td>".$res['product_name']."</td>";
			echo "<td>".$res['description']."</td>";
      echo "<td>".$res['product_type']."</td>";
			echo "<td>".$res['cost']."</td>";
			echo "<td>".$res['sell_price']."</td>";
			echo "<td>".$res['quantity']."</td>";
			echo "<td>".$res['vname']."</td>";
            echo "<td>".$res['ename']."</td>";
            echo "</tr>";


		}
		?>
	</table>

   </body>
   
</html>