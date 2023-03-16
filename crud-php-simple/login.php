<html>
<head>
	<title>Login</title>
</head>

<body>
	<h2>Login</h2>
	<p>
		<a href="index.php">Home</a>
	</p>

	<form action="loginAction.php" method="post" name="login" onsubmit = "return validation()">
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
				<td></td>
				<td><input type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<script>
 function validation(){
    var email = document.login.email.value;
    var pass = document.login.password.value;

    if(email.length == '' && pass.length==''){
        alert('Email and Password fields are empty');
        return false;
    }else{
        if(email.length == ''){
            alert('Email field is empty');
            return false;
        }
        if(pass.length == ''){
            alert('Password field is empty');
            return false;
        }
    }
 }    
</script>