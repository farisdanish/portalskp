<?php include("connection.php"); //$conn ?>
<?php
	$id = $_POST['id'];
	
	$application_status = $_POST['application_status'];
	
	$sql = "UPDATE application SET application_status = '$application_status' WHERE stud_id='$id'";	
	if($conn -> query($sql) === true)
	{
		echo "<script>alert('Your data has successfully updated!');window.location = 'appList.php';</script>";
	}
	else
	{
		echo"<script>alert('Failed to update your data. Please try again.');window.location = 'appdetails.php';</script>";
	}
?>