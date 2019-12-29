<!doctype html>
<?php
		include("connection.php");
		if(!empty($_POST['search'])){//function empty() is used to check null,"",0,etc
				  $sql = "SELECT * FROM application WHERE stud_id='".$_POST['search']."'";
				  $query = $conn -> query($sql);
				  $row = $query -> fetch_assoc();
		}else{
			$sql = "SELECT * FROM application";
			$query = $conn -> query($sql) or die($conn->error);//to display error in connection to database(if any)
			$row = $query -> fetch_assoc();
		}

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Application List - ADMIN</title>
	<style type="text/css" media="all">
		@import url("bootstrap/css/bootstrap.css");
	</style>
</head>
<body>
	<div align="center">
		<h1 style="background-color:lightgreen; font-weight: bold;" align="center">SKP APPLICATION LIST<hr></h1>
		<br>
			<form method="post" action ="appList.php">
				<input type="text" name="search" placeholder="Student ID">
				<input type="submit" value="search" >
			</form>
			<br>
			
		<div class="container">
			<section id="Company" class="container content-section no-padding">

				<div class="table-responsive">
					<table name="complaint list" class="table table-sm table-bordered table table-striped table-hover table-condensed" align="center">
						<thead>
						<tr>
							<th>Application ID</th>
							<th>Student ID</th>
							<th>Application Status</th>
							<th colspan="2">Action</th>
						</tr>
						</thead>
						<?php if($row == 0)
								echo "No records found";
							else
								do { ?>
							<tr>
							<td><?php echo $row['application_id']; ?></a></td>
							<td><?php echo $row['stud_id']; ?></td>
							<td><?php	if($row['application_status']===NULL){
											echo "IN REVIEW";
										}else{
								  			echo $row['application_status'];
										}
								?>
							</td>
							<td align="center"><a href="appdetails.php?id=<?php echo $row['stud_id']; ?>"class="btn btn-success btn-sm">Expand</a></td>
							<td align="center"><a href = "deleteApp.php?application_id=<?php echo $row['application_id'];?>"onclick="return check()" class="btn btn-danger btn-sm">Delete</a></td>
						<?php } while($row = $query -> fetch_assoc()) 	
							?>
					<tr><td colspan = "5" align ="center"><a href ="adminMenu.php"><button class="btn btn-danger btn-sm">BACK</button></td></tr>
					</table>
				</div>
				<script>
			function check() {
				//function confirm() will produce an alert box which will reeturn true or false
				var choice = confirm ("Are you sure you want to remove this Student?");
				if(choice == true){
					return true;}
				else {return false;}
			}
		</script>
			</section>
		</div>
	</div>
</body>
</html>