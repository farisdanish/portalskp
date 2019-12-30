<?php include("connection.php"); session_start();//$conn?>
<?php
		$stud_id = $_SESSION['id'];
		$sql = "SELECT * FROM student JOIN application WHERE application.stud_id = '$stud_id' AND student.stud_id = '$stud_id'";
		$query = $conn -> query($sql) or die($conn->error);//to display error in connection to database(if any)
		$row = $query -> fetch_assoc();
?>
	<html>
		<head>
			<title>Application Details - Student</title>
		<style>
			.container{
				border:2px solid black;
				padding:10px;
				margin:100px 10px 20px 10px;
				background-color:lightgrey;
			}
			
			body{
				background-color = "";
			}
			
			input[type=submit]{
				background: rgba(0,0,0,0.6);
				border:2px solid lightgreen;
				padding:10px;
				border-radius:10px;
			}
		</style>
		</head>
		<link href="Bootstrap/css/bootstrap.min.css"rel="stylesheet" media="all">
		<body>
		
			<div align= "center">
			<h1 style="background-color:lightblue; font-weight: bold;" align="center">Your Application Details<hr></h1>
			<?php
			$sqlid = "SELECT * FROM student JOIN application WHERE application.stud_id = '$stud_id' AND student.stud_id = '$stud_id'";
			$queryid = $conn -> query($sqlid) or die($conn->error);
			$numid = $queryid -> fetch_assoc();
	
			if($numid==0){
				echo "<script>alert('You have not made an application yet!!');
				window.location='studMenu.php';</script>";
			}else
			?>
			<form>	
			<table cellpadding="5">
				<tr>
					<th>Student Info</th>
					<th>Application Info</th>
				</tr>
				<tr><td>Matric ID: <?php echo $row['stud_id']; ?></td><td>Application ID : <?php echo $row['application_id']; ?></td></tr>
				<tr><td>Name: <?php echo $row['stud_name']; ?></td><td>Latest GPA : <?php echo $row['latest_gpa']?></td></tr>
				<tr><td>MyKad Num : <?php echo $row['stud_ic']; ?></td><td>Credit Hours : <?php echo $row['credit_hrs']?></td></tr>
				<tr><td>Address : <?php echo $row['stud_addr']; ?></td><td>Benefactor Name : <?php echo $row['bene_name']?></td></tr>
				<tr><td>Contact Num : <?php echo $row['stud_ctc']; ?></td><td>Benefactor Address : <?php echo $row['bene_addr']?></td></tr>
				<tr><td>Semester : <?php echo $row['stud_part']; ?></td><td>Benefactor Contact No. : <?php echo $row['bene_ctc']?></td></tr>
				<tr><td>Programme Name : <?php echo $row['prog_name']; ?></td><td>Benefactor Salary : RM<?php echo $row['bene_salary']?></td></tr>
				<tr><td>Programme Code : <?php echo $row['prog_code']; ?></td><td>Application Date : <?php echo $row['app_date']?></td></tr>
				<tr><td>Joined SKP before : <?php if($row['skp_vet'] == true)echo "Yes"; else echo "No";?>
					</td><td>Father Status : <?php echo $row['dad_status']?></td></tr>
				<tr><td><?php if($row['skp_vet'] == true){?>SKP Place : <?php echo $row['skp_place']; }else ?></td>
					<td>Father Occupation : <?php echo $row['dad_occu']?></td></tr>
				<tr><td><?php if($row['skp_vet'] == true){?>SKP Date : <?php echo $row['skp_date']; }else ?></td>
					<td>Father Salary : RM<?php echo $row['dad_salary']?></td></tr>
				<tr><td></td><td>Mother Status : <?php echo $row['mom_status']?></td></tr>
				<tr><td></td><td>Mother Occupation : <?php echo $row['mom_occu']?></td></tr>
				<tr><td></td><td>Mother Salary : RM<?php echo $row['mom_salary']?></td></tr>
				<tr><td></td><td>No. of Siblings : <?php echo $row['siblings']?></td></tr>
				<tr><td>Computer Skills : <?php echo $row['comp_skills']; ?></td>
					<td>Order Among Siblings : <?php echo $row['order_in_fam']?></td></tr>
				<tr><td>Transport : <?php echo $row['transport']; ?></td><td>Work Experience : <?php echo $row['work_exp']?></td></tr>
				<tr><td></td><td>Application Status : <?php echo $row['application_status']?></td></tr>
				</table>
			</form>
				<script>
				function check() {
				//function confirm() will produce an alert box which will reeturn true or false
				var choice = confirm ("Are you sure you want to remove this applicant?");
				if(choice == true){
					return true;}
				else {return false;}
			}
				</script>
			<table name="temp" class="table table-sm table-bordered table table-striped table-hover table-condensed" align="center">
				<tr><td><a href = "deleteAppStud.php?application_id=<?php echo $row['application_id'];?>"onclick="return check()" class="btn btn-danger btn-sm">Delete</a></td><td align ="center"><a href ="studMenu.php"><button class="btn btn-danger btn-sm">BACK</button></td></tr>
			</table>
		</body>
	</html>