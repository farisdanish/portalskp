<?php
	include ("connection.php");
?>

<?php

	$id = $_GET['application_id'];
	
	$sql = " DELETE FROM application WHERE application.application_id = '$id'";
	$conn -> query($sql);
		
	echo "<script>alert('Data deleted successfully');
				window.location='appList.php';</script>";
?>	