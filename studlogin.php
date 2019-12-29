<?php include("connection.php"); ?>
<?php
		if (isset($_POST['studID']) and isset($_POST['password'])){
			// username and password sent from form
    		$studID = $_POST['studID'];
			$password = $_POST['password'];
			
    		$sql = "SELECT * FROM student WHERE stud_id='$studID' and password='$password'";
    		$query = $conn -> query($sql);
			$row = $query -> fetch_assoc();
			$num = $query -> num_rows;
    		// If result matched $myusername and $mypassword, table row must be 1 row
    		if($num == 1) {
				session_start();
        		$_SESSION['logged_in'] = true;
        		header("Location: studMenu.php");
			}else {
        		echo "<script>alert('You have entered a wrong username or password!');
				window.location='studlogin.php';</script>";
    		}
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student Log In</title>
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
		<link href="Bootstrap/css/bootstrap.min.css"rel="stylesheet" media="all">
	</head>
	<body>
		<!-- The sidebar -->
		<div class="sidebar">
  			<a href="index.html">Home</a>
  			<a class="active" href="studlogin.php">Student</a>
  			<a href="adminlogin.php">Admin</a>
		</div>
		
		<div class="content"> 
			<div align="center" style="margin-top:18%">
			<fieldset style ="width:250px" align ="left">
				
				<form method = "POST" action ="studlogin.php">
					<table align="center">
						<tr><td><font color="#FFFFFF">Student ID: </font></td><td><input type="text" name= "studID" required ></td></tr>
						<tr><td><font color="#FFFFFF">Password: </font></td><td><input type="password" name= "password" required ></td></tr>
						<tr><td colspan = "2" align ="right"><input type ="submit" value="Log In"></td></tr>
					</table>
				</form>	
			</fieldset>
			</div>
		</div>
	</body>
</html>