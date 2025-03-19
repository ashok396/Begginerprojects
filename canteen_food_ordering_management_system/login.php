<?php
session_start();
	require('db.php');
	// If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: insert.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<style>
body{background-color:lightblue;}
input[type='date'],input[type='password'],input[type='text']{background-color:lightgreen;height:40px;width:250px;}
input[type='submit'] {background-color:#008CBA;font-size:20px;}
p{background-color:yellow;}
</style>
	</head>
	<body>
		<div align="center" class="form">
			<h1>Log In</h1>
			<form action="" method="post" name="login">
				<table>
					<tr>
					    <td><b>Login-Id:</b></td><td><input type="text" name="username" placeholder="Username" required /></td>
					</tr>
					<tr>
						<td><b>Password:</b></td><td><input  type="password" name="password" placeholder="Password" required /></td>
					</tr>
					<tr>
						<td> <a href='registration.php'>Register Here</a></td>
						<td><input   name="submit" type="submit" value="Login" /></td>
					</tr>
				</table>
			<form>
		</div>
		<?php } ?>
	</body>
</html>
