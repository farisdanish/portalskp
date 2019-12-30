<?php include("connection.php"); session_start();?>
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
				$_SESSION['id']=$studID;
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
					<div class="container">
    					<label for="uname"><font color="#000000"><b>Student ID</b></font></label>
    					<input type="text" placeholder="Enter Student ID" name= "studID" required >

    					<label for="uname"><font color="#000000"><b>Password</b></font></label>
    					<input type="password" placeholder="Enter Password" name= "password" required >
						<br>&nbsp;</br>
    					<button type="submit">Login</button>
  					</div>
				</form>	
			</fieldset>
			</div>
		</div>
	</body>
</html>