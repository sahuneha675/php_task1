<?php
// Include the database connection file
require_once("dbConnection.php");
session_start();


// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM vendor");
// Fetch the next row of a result set as an associative array
// $resultData = mysqli_fetch_assoc($result);
// while ($row = mysqli_fetch_assoc($result)) {     
		
//     print_r($row);   
    
// }
// print_r($resultData); die;
?>
<html>
<head>
	<title>Add Product</title>
</head>

<body>
<h4><a href = "logout.php">Sign Out</a></h4>

	<h2>Add Product</h2>
	
    <form action="addProductionAction.php" method="post" name="add"  onsubmit = "return validation()">
		<table width="30%" border="0">
			<tr> 
				<td>Product Name</td>
				<td><input type="text" name="pname"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="desc"></td>
			</tr>
			<tr>
                <td>Type</td>
                <td>
		    	<input type="radio" id="electronics" name="type" value="electronics">
				<label for="electronics">electronics</label>
				<input type="radio" id="furniture" name="type" value="furniture">
				<label for="furniture">furniture</label>
                <input type="radio" id="kitchen" name="type" value="kitchen">
				<label for="kitchen">kitchen</label>
                </td>
			</tr>
			<tr> 
				<td>Cost</td>
				<td><input type="text" name="cost"></td>
			</tr>
			<tr> 
				<td>Sell Price</td>
				<td><input type="text" name="sellprice"></td>
			</tr>
            <tr> 
				<td>Quantity</td>
				<td><input type="text" name="quantity"></td>
			</tr>
            <tr> 
				<td>Select a vendor</td>
				<td>
					<select name="vendorid" id="vendorid">
                        <option value="">Select</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) {  ?>   
		                    <option value="<?php echo $row['vid']; ?>"><?php echo $row['name']?></option>

                        <?php } ?>
                    </select>
				</td>
			</tr>
			<tr> 
				<td><input type="hidden" name="eid" value=<?php echo $_SESSION['id']; ?>></td>

				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<script>
 function validation(){
    var pname = document.add.pname.value;
    var type = document.add.type.value;
    var quantity = document.add.quantity.value;
    var cost = document.add.cost.value;
    var sellprice = document.add.sellprice.value;


        if(type.length == ''){
            alert('Error! Product type should be selected.');
            return false;
        }
        if(quantity <= 0){
            alert('Error! Quantity must be greater than 0.');
            return false;
        }
        if(sellprice < cost){
            alert('Error! Sell price must be greater than the cost.');
            return false;
        }

 }    
</script>