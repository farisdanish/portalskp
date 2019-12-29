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
			<h1>ADMINISTRATOR MENU</h1>
				<fieldset style ="width:500px" align ="center">
					<legend> PLEASE CHOOSE </legend>
						<table align="center">
							<tr><td colspan = "5" align ="right"><a href ="appList.php"><button class="btn btn-success btn-sm">View Applications</button></a></td>
							<td></td>

							<td colspan = "5" align ="right"><a href ="adminlogout.php"><button class="btn btn-danger btn-sm">LOG OUT</button>
						</table>
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

