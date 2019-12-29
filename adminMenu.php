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
			  background-image: url("background1.jpg");
			  background-repeat: no-repeat;
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

