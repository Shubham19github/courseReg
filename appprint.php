<?php

require 'core.inc.php';
$fullname = getuserfield('fullname');
$username = getuserfield('username');

$query1 = "SELECT fullname, sex, hostel, DOB, category, email, contact, sgpa, cgpa, challan_no, challan_date, amount FROM students WHERE username='".mysqli_real_escape_string($mysql_connect, $username)."' ";
$query_run1 = mysqli_query($mysql_connect, $query1);
$query_row1 = mysqli_fetch_assoc($query_run1);

$fullname = $query_row1['fullname'];
$sex = $query_row1['sex'];
$hostel = $query_row1['hostel'];
$DOB = $query_row1['DOB'];
$category = $query_row1['category'];
$email = $query_row1['email'];
$contact = $query_row1['contact'];
$sgpa = $query_row1['sgpa'];
$cgpa = $query_row1['cgpa'];
$challan_no = $query_row1['challan_no'];
$challan_date = $query_row1['challan_date'];
$amount = $query_row1['amount'];

$query2 = "SELECT core1,core2,core3,core4,opt1,opt2,opt3,total_credit FROM course_registered WHERE username='".mysqli_real_escape_string($mysql_connect, $username)."' ";
$query_run2 = mysqli_query($mysql_connect, $query2);
$query_row2 = mysqli_fetch_assoc($query_run2);

$core1 = $query_row2['core1'];
$core2 = $query_row2['core2'];
$core3 = $query_row2['core3'];
$core4 = $query_row2['core4'];
$opt1 = $query_row2['opt1'];
$opt2 = $query_row2['opt2'];
$opt3 = $query_row2['opt3'];
$total_credit = $query_row2['total_credit'];

$check="Not taken";
$checkname="";
if($opt1==$check){$checkname='CS621';}
else if($opt2==$check){$checkname='CO423';}
else if($opt3==$check){$checkname='CO421';}

$query3 = "SELECT * FROM courses ";
$query_run3 = mysqli_query($mysql_connect, $query3);
$query_row3 = mysqli_num_rows($query_run3);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Print</title>
		<link rel="stylesheet" type="text/css" href="resources/styles.css">
		<style>
			body{
				background-color: white;
				background-image: none;
			}
			h4{
				text-align:center;
				margin-bottom:0px;
				margin-top: 0px;
			}
			p{
				font-weight: bold;
				display:inline-block;
				margin-bottom: 1.5px;
				margin-top: 1.5px;
				font-size: 15px;
			}
			#sem{
				display:inline-block;
				border:1px solid black;
				width:50%;
				padding:5px;
				
			}
			#bank{
				float:right;
				border:1px solid black;
				width:50%;
				padding:5px;

			}
			#sign{
				float:right;
				width:50%;
				padding:5px 5px 5px 25px;
			}
			#small{
				font-size: 13px;
				font-weight: normal;
				text-align: justify;
			}
			#rt{
				float: right;
				width: 50%;
			}
			#lt{
				display: inline-block;
				width: 50%;
			}
			table{				
				width:100%;
			}
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;				
			}
			th, td {
				padding: 3px;
				text-align: center;
				border-bottom: 1px solid black;
			}
			#upr{
				vertical-align: top;
			}
		</style>
		<script>
			function myFunction() {
			    window.print();
			}
		</script>
	</head>

	<body>

		<div class="row">
			
			<div class="col-1">
			</div>

			<div class="col-2">
				<button onclick="myFunction()">Print this page</button>
				<h4><strong>TEZPUR UNIVERSITY</strong></h4>
				<h4><strong>ENROLMENT-CUM-COURSE REGISTRATION CARD</strong></h4>
				<h4>(To be filled by the continuing students)</h4><br>
				<div id="lt"><p>Name of the Student :&nbsp;</p><?php echo $fullname ?><br>
					<p>Programme :&nbsp;</p>B.Tech<br>
					<p>(Spring/Autumn) 20</p>17
				</div>
				<div id="rt"><p>Enrollment No. :&nbsp;</p><?php echo $username ?><br>
					<p>Semester No. :&nbsp;</p>6<br>
					<p>Category(SC/ST/OBC/PH/TG) :&nbsp;</p><?php echo $category ?>
				</div>
				<br><br>
				<div id="sem">
					<p>Record of Last Sem Examination</p><br>
					<p>Semester No. &nbsp;5&nbsp;&nbsp;&nbsp;&nbsp;20</p>16<br>
					<p>SGPA secured :&nbsp;</p><?php echo $sgpa ?><br>
					<p>CGPA secured :&nbsp;</p><?php echo $cgpa ?><br>
				</div>
				<div id="bank">
					<p>Fees Paid : Rs.&nbsp;</p><?php echo $amount ?><br>
					<p>Paid By Challan</p><br>
					<p>(Journal No. &nbsp;</p><?php echo $challan_no ?><p>&nbsp;)</p><br>
					<p>Date :&nbsp;</p><?php echo $challan_date ?>
				</div>
				<div style="display: inline-block;">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
				<div id="sign">
					<br>
					<br>
					<p>Signature of the student</p><br>
					<p>Mobile No.&nbsp;</p><?php echo $contact ?><br>
					<p>e-mail :&nbsp;</p><?php echo $email ?><br>
				</div>
				
				<hr>
				<h4>Recommendation of the warden</h4>
				<p id="small">The above mentioned student has maintained discipline and has no outstanding dues. He/She is recommended for admission in the hostel in Autumn / Spring semester 2016.</p><br><br>
				<div id="lt">
					<br>
					<p>Name of Hostel :&nbsp;</p><?php echo $hostel ?><br>
					<p>Date :&nbsp;</p><?php echo date("Y-m-d") ?><br>
				</div>
				<div id="rt">
					<br>
					<h4>Warden</h4>
					<h4><?php echo $hostel ?></h4>
				</div>
				
				<hr>
				<h4>Course Registration</h4><br>
				<?php

					if ($query_row3 > 0) 
					{
					     echo "<table><tr><th>Course Code</th><th>Course Title/Dissertion Title</th><th>Credit</th><th>Course Type</th><th rowspan='7' id='upr'>Remarks</th><th rowspan='7' id='upr'>Sign of Course Advisor</th></tr>";
					     while($row = mysqli_fetch_assoc($query_run3)) 
					     {
					     	if($row["code"]==$checkname){
					     		continue; }
					     	else{
					         echo "<tr><td>" . $row["code"]. "</td><td>" . $row["cname"]. "</td><td>" . $row["credit"]. "</td><td>" . $row["type"]. "</td></tr>";
					     	}
     	
					     }
					     echo "<tr><td colspan='2'>Total</td><td>" . $total_credit. "</td><td colspan='3'>&nbsp;</td></tr>";
					     echo "</table>";
					} else {
					     echo "0 results";
					}

				?>

				
				<hr>
				<h4>Recommendation of the Head of the Department</h4>
				<p id="small">The above mentioned student has satisfied the academic requirements for enrollment to Autumn/Spring semester 2017</p><br><br>
				<div id="lt">
					<p>Date.</p><?php echo date("Y-m-d") ?>
				</div>
				<div id="rt">
					<h4>Head of The Department</h4>
				</div>

			</div>

			<div class="col-1">
			</div>

		</div>
	
	</body>
</html>
