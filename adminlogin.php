<?php include("connection.php"); ?>
<?php
		if (isset($_POST['username']) and isset($_POST['password'])){
			// username and password sent from form
    		$username = $_POST['username'];
			$password = $_POST['password'];
			
    		$sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
    		$query = $conn -> query($sql);
			$row = $query -> fetch_assoc();
			$num = $query -> num_rows;
    		// If result matched $myusername and $mypassword, table row must be 1 row
    		if($num == 1) {
				
				session_start();
        		$_SESSION['username'] = $username;
        		$_SESSION['password'] = $password;
        		header("Location: adminMenu.php");
			}else {
        		echo "<script>alert('You have entered a wrong username or password!');
				window.location='adminlogin.php';</script>";
    		}
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Log In</title>
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
	</head>
	<body>
		<!-- The sidebar -->
		<div class="sidebar">
  			<a href="index.html">Home</a>
  			<a href="studlogin.php">Student</a>
  			<a class="active" href="adminlogin.php">Admin</a>
		</div>
		
		<div class="content"> 
			<div align="center" style="margin-top:18%">
			<fieldset style ="width:250px" align ="left">
				
				<form action="adminlogin.php" method="POST">
					<table align="center">
						<tr><td>Username: </td><td><input type="text" name= "username" required ></td></tr>
						<tr><td>Password: </td><td><input type="password" name= "password" required ></td></tr>
						<tr><td colspan = "2" align ="right"><input type ="submit" value="Log In"></td></tr>
					</table>
				</form>	
			</fieldset>
			</div>
		</div>
	</body>
</html>