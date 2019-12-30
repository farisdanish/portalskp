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
	<style>
	#background1{
		background-size: 1400px 800px;
		background-repeat: no-repeat;
		background-color: #FFFAF0;
		}
	</style>
	<script>
		function currentDate(){
			var today = new Date();
			var dd = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			document.myform.app_date.value = dd;
		}
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
	<title>Create Application - STUDENT</title>
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
			<form name="myform" method="post" action="addapplicant.php" onsubmit="return validate()">
			<table cellpadding="5">
				<tr><td> </td><td><input type="hidden" name="stud_id" value="<?php echo $id ?>" class="form-control" required></td></tr>
				<tr><td>Latest GPA: </td><td><input type="text" name="latest_gpa" onchange="currentDate()" class="form-control" required></td></tr>
				<tr><td>Credit Hours: </td><td><input type="text" name="credit_hrs" class="form-control" required></td></tr>
				<tr><td>Joined SKP before: 
					<div id="ifSKPYes" style="display:none">
					SKP Place: <br>
					SKP Date: 
					</div></td><td>
					<input type="radio" id="skpyes" onclick="javascript:skpcheck();" name="skp_vet" value="Yes"> Yes
					<input type="radio" onclick="javascript:skpcheck();" name="skp_vet" value="No"> No
					<div id="ifSKPYes1" style="display:none">
						<input type="text" name="skp_place"><br>
						<input type="date" name="skp_date">
					</div>
				</td></tr>
				<tr><td>Computer Skill: </td>
					<td><input type="radio" name = "comp_skill" value = "Mahir" > Good
						<input type="radio" name = "comp_skill" value = "Sederhana"> Satisfactory
						<input type="radio" name = "comp_skill" value = "Tidak Mahir"> Bad</td></tr>
				<tr><td>Transport: </td>
					<td><input type="radio" name = "transport" value = "Kereta"> Car
						<input type="radio" name = "transport" value = "Motosikal"> Motorcycle
						<input type="radio" name = "transport" value = "Pengangkutan Awam"> Public Transport</td></tr>
				<tr><td>Benefactor Name: </td><td><input type="text" name="bene_name" class="form-control"></td></tr>
				<tr><td>Benefactor Address: </td><td><input type="text" name="bene_addr" class="form-control"></td></tr>
				<tr><td>Benefactor Contact Num: </td><td><input type="text" name="bene_ctc" class="form-control"></td></tr>
				<tr><td>Benefactor Salary: </td><td><select name="bene_salary" class="form-control">
					<option selected value="0">Select Range</option>
					<option value="0-999">0-999</option>
					<option value="1000-1999">1000-1999</option>
					<option value="2000-2999">2000-2999</option>
					<option value="3000-3999">3000-3999</option>
					<option value="4000++">4000 ++</option>
				</select>
				</td></tr>
				<tr><td></td><td><input type="hidden" name="app_date" class="form-control" required></td></tr>
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
						<select name="dad_salary" class="form-control">
							<option selected value="0">Select Range</option>
							<option value="0-999">0-1000</option>
							<option value="1000-1999">1000-1999</option>
							<option value="2000-2999">2000-2999</option>
							<option value="3000-3999">3000-3999</option>
							<option value="4000 ++">4000 ++</option>
						</select>
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
						<select name="mom_salary" class="form-control">
							<option selected value="0">Select Range</option>
							<option value="0-999">0-1000</option>
							<option value="1000-1999">1000-1999</option>
							<option value="2000-2999">2000-2999</option>
							<option value="3000-3999">3000-3999</option>
							<option value="4000 ++">4000 ++</option>
						</select>
					</div>
				</td></tr>
				<tr><td>Number of Siblings: </td><td><input type="text" name="siblings" class="form-control" required></td></tr>
				<tr><td>Order Among Siblings: </td><td><input type="text" name="order_in_fam" class="form-control" required></td></tr>
				<tr><td>Work Exprience: </td><td><input type="textarea" name="work_exp" placeholder="Where,Position,Duration" class="form-control"></td></tr>
				<tr><td>I hereby acknowledged that the information above are true to this date: </td><td><input type="checkbox" name="agreement" class="form-control" required></td></tr>
				
				<tr><td colspan="2" align="right">
				<tr><td colspan="2" align="right"><input type="Submit" value="Submit" class="btn btn-success"><td>
				<td colspan="2"><a href="studMenu.php"><button type="button" class="btn btn-secondary">Back</button></a></td></tr>
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