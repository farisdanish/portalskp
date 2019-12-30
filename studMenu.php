<?php include 'connection.php';
session_start();
if (! empty($_SESSION['logged_in']))
{
	$id = $_SESSION['id'];
	$_SESSION['id']=$id;
	$sql = "SELECT * FROM student WHERE stud_id = '$_SESSION[id]' ";
	$query = $conn -> query($sql) or die($conn->error);//to display error in connection to database(if any)
	$row = $query -> fetch_assoc();
?>
<html>
	<style>
			
			h1,fieldset,legend
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
		<title>Menu - STUDENT</title>
	</head>
	<body>
		<div align ="center" style="margin-top:15%">
			<fieldset style ="width:500px" align ="center">
				<div class="card">
  						<div class="card-header"><font color="#000000"><b>STUDENT MENU</b></font></div>
  				<div class="card-body">
				<legend><font color="#000000">PLEASE CHOOSE</font></legend>
					<p><font color="#000000"><?php echo $row['stud_id'] ?></font></p>
					<table align="center">
					<tr>
						<td colspan = "5" align ="right"><a href ="addapplicant.php"><button class="btn btn-primary btn-sm">Insert Application</button></td>
						<td></td>
					<td colspan = "5" align ="right"><a href ="detailsStudent.php"><button class="btn btn-success btn-sm">View Application's Status</button></td>
						<td></td>	
						<td colspan = "5" align ="right"><a href ="studlogout.php"><button class="btn btn-danger btn-sm">LOG OUT</button>
					</table>
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
    echo 'You are not logged in. <a href="studlogin.php">Click here</a> to log in.';
}
?>