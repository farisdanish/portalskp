<?php include("connection.php"); session_start();//$conn ?>
<?php
if (! empty($_SESSION['logged_in']))
{
	$id= $_SESSION['id'];
?>
<?php
	if(isset($_POST['stud_id'])){
		
		$gpa = $_POST['latest_gpa'];
		$credit = $_POST['credit_hrs'];
		$bname = $_POST['bene_name'];
		$baddr = $_POST['bene_addr'];
		$bctc = $_POST['bene_ctc'];
		$bsalary = $_POST['bene_salary'];
		$agreement = $_POST['agreement'];
		$date = $_POST['app_date'];
		$dstatus = $_POST['dad_status'];
		$doccu = $_POST['dad_occu'];
		$dsalary = $_POST['dad_salary'];
		$mstatus = $_POST['mom_status'];
		$moccu = $_POST['mom_occu'];
		$msalary = $_POST['mom_salary'];
		$siblings = $_POST['siblings'];
		$order_in_fam = $_POST['order_in_fam'];
		$workexp = $_POST['work_exp'];
		$skpvet = $_POST['skp_vet'];
		$skpplace = $_POST['skp_place'];
		$skpdate = $_POST['skp_date'];
		$compskill = $_POST['comp_skill'];
		$transport = $_POST['transport'];
		
		
			$sql = "INSERT INTO application( stud_id, latest_gpa, credit_hrs, bene_name,bene_addr, bene_ctc, bene_salary, agreement, app_date, dad_status, dad_occu, dad_salary, mom_status, mom_occu, mom_salary, siblings, order_in_fam, work_exp, skp_vet, skp_place, skp_date, comp_skills, transport) VALUES ('$id', '$gpa', '$credit', '$bname', '$baddr', '$bctc', '$bsalary', '$agreement', '$date', '$dstatus', '$doccu', '$dsalary', '$mstatus', '$moccu', '$msalary', '$siblings', '$order_in_fam', '$workexp','$skpvet', '$skpplace', '$skpdate', '$compskill', '$transport')";
			if($conn -> query($sql) === true){
				echo "<script>alert('Well Done!');window.location='studMenu.php'</script>";
			}else{
				echo "<script>alert('Do it Again!');</script>";
			}
		
	}
?>
<html>
	<script>
		function fathercheck() 
		{
			if (document.getElementById('fatheryes').checked)
			{
				document.getElementById('ifFathYes').style.display = 'block';
				document.getElementById('ifFathYes1').style.display = 'block';
			}
			else
			{
				document.getElementById('ifFathYes').style.display = 'none';
				document.getElementById('ifFathYes1').style.display = 'none';
			}
		}
		
		function mothercheck() 
		{
			if (document.getElementById('motheryes').checked)
			{
				document.getElementById('ifMothYes').style.display = 'block';
				document.getElementById('ifMothYes1').style.display = 'block';
			}
			else
			{
				document.getElementById('ifMothYes').style.display = 'none';
				document.getElementById('ifMothYes1').style.display = 'none';
			}
		}
		function skpcheck() 
		{
			if (document.getElementById('skpyes').checked)
			{
				document.getElementById('ifSKPYes').style.display = 'block';
				document.getElementById('ifSKPYes1').style.display = 'block';
			}
			else
			{
				document.getElementById('ifSKPYes').style.display = 'none';
				document.getElementById('ifSKPYes1').style.display = 'none';
			}
		}
	</script>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">
</head>
	<body>
		<?php
			$sqlid = "SELECT * FROM application WHERE application.stud_id = '$id'";
			$queryid = $conn -> query($sqlid);
			$numid = $queryid -> num_rows;
	
			if($numid==0){
		?>
		<div align="center" style="font-family:georgia,garamond,serif;font-size:16px;">
		<h1>New Application</h1><hr><br>
			<form method="post" action="addapplicant.php" onsubmit="return validate()">
			<table cellpadding="5">
				<tr><td>Student ID: </td><td><input type="text" name="stud_id" value="<?php echo $id ?>" required></td></tr>
				<tr><td>Latest GPA: </td><td><input type="text" name="latest_gpa" required></td></tr>
				<tr><td>Credit Hours: </td><td><input type="text" name="credit_hrs" required></td></tr>
				<tr><td>Joined SKP before: 
					<div id="ifSKPYes" style="display:none">
					SKP Place: <br>
					SKP Date: 
					</div></td><td>
					<input type="radio" id="skpyes" onclick="javascript:skpcheck();" name="skp_vet" value="Yes">Yes
					<input type="radio" onclick="javascript:skpcheck();" name="skp_vet" value="No">No
					<div id="ifSKPYes1" style="display:none">
						<input type="text" name="skp_place"><br>
						<input type="date" name="skp_date">
					</div>
				</td></tr>
				<tr><td>Computer Skill: </td>
					<td><input type="radio" name = "comp_skill" value = "Great"> Great
						<input type="radio" name = "comp_skill" value = "Good"> Good
						<input type="radio" name = "comp_skill" value = "Amateur"> Amateur</td></tr>
				<tr><td>Transport: </td>
					<td><input type="radio" name = "transport" value = "Car"> Car
						<input type="radio" name = "transport" value = "Motorcycle"> Motorcycle
						<input type="radio" name = "transport" value = "Public Transport"> Public Transport</td></tr>
				<tr><td>Benefactor Name: </td><td><input type="text" name="bene_name"></td></tr>
				<tr><td>Benefactor Address: </td><td><input type="text" name="bene_addr"></td></tr>
				<tr><td>Benefactor Contact Num: </td><td><input type="text" name="bene_ctc"></td></tr>
				<tr><td>Benefactor Salary: </td><td><input type="text" name="bene_salary"></td></tr>
				<tr><td>Application Date: </td><td><input type="date" name="app_date" required></td></tr>
				<tr><td>Father Status: 
					<div id="ifFathYes" style="display:none">
					Father Occupation: <br>
					Father Salary: 
					</div></td><td>
					<input type="radio" id="fatheryes" onclick="javascript:fathercheck();" name="dad_status" value="Alive">Alive
					<input type="radio" onclick="javascript:fathercheck();" name="dad_status" value="Pass Away">Pass Away
					<input type="radio" onclick="javascript:fathercheck();" name="dad_status" value="Untraceable">Untraceable
					<div id="ifFathYes1" style="display:none">
						<input type="text" name="dad_occu"><br>
						<input type="text" name="dad_salary">
					</div>
				</td></tr>
				<tr><td>Mother Status: 
					<div id="ifMothYes" style="display:none">
					Mother Occupation: <br>
					Mother Salary: 
					</div></td><td>
					<input type="radio" id="motheryes" onclick="javascript:mothercheck();" name="mom_status" value="Alive">Alive
					<input type="radio" onclick="javascript:mothercheck();" name="mom_status" value="Pass Away">Pass Away
					<input type="radio" onclick="javascript:mothercheck();" name="mom_status" value="Untraceable">Untraceable
					<div id="ifMothYes1" style="display:none">
						<input type="text" name="mom_occu"><br>
						<input type="text" name="mom_salary">
					</div>
				</td></tr>
				<tr><td>Number of Siblings: </td><td><input type="text" name="siblings" required></td></tr>
				<tr><td>Order Among Siblings: </td><td><input type="text" name="order_in_fam" required></td></tr>
				<tr><td>Work Experience: </td><td><input type="textarea" name="work_exp" placeholder="Where,Position,Duration"></td></tr>
				<tr><td>Agreement: </td><td><input type="checkbox" name="agreement" required></td></tr>
				
				<tr><td colspan="2" align="right"><input type="Submit" value="Submit"><td></tr>
				<tr><td colspan="2" align="right"><a href="studMenu.php">Back</a>&nbsp &nbsp
				<a href="studlogout.php">Logout</a></td></tr>
				</table>
			</form>
		</div>
		<?php
			}
			else{
				echo "<script>alert('You have already submitted an application!');
				window.location='studMenu.php';</script>";
			}
		?>
		<script>
			function validate(){
				var name = document.getElementByName("dad_status")[0].value;
				
				if(isNaN(dad_status) == false){
					alert("This field does not accept nonalphabetic character!");
					return false;
				}
			}
		</script>
	</body>
</html>
<?php
}
else
{
    echo 'You are not logged in. <a href="studlogin.php">Click here</a> to log in.';
}
?>