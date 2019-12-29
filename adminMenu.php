<?php
session_start();
if (! empty($_SESSION['logged_in']))
{
	?>
	<html>
		<style>
			
			h1,fieldset
			{
				color: aliceblue;
			}
			body 
			{
			  margin: 0;
			  padding: 0;
	          background:linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)),url("background1.jpg") no-repeat center center fixed;
	          background-size: cover;
	          min-height: 100%;
			}
		</style>
		<head>
			<link href ="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">
			<title>Menu - ADMIN</title>
		</head>
		<body>
			<div align ="center" style="margin-top:15%">
				<fieldset style ="width:500px" align ="center">
					<div class="card">
  						<div class="card-header"><font color="#000000"><b>ADMINISTRATOR MENU</b></font></div>
  					<div class="card-body">
    					<h5 class="card-title"><font color="#000000">Please Choose</font></h5>
   						<a href ="appList.php"><button class="btn btn-success btn-sm">View Applications</button></a>
						<a href ="adminlogout.php"><button class="btn btn-danger btn-sm">LOG OUT</button></a>
  					</div>
					</div>
				</fieldset>		
			</div>
		<body>
	</html> 
					
<?php
}
else
{
    echo 'You are not logged in. <a href="adminlogin.php">Click here</a> to log in.';
}
?>

