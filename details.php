<?php
require 'core.inc.php';
$fullname = getuserfield('fullname');
$username = getuserfield('username');

if(isset($_POST['hostel'])&&isset($_POST['dob'])&&isset($_POST['email'])&&isset($_POST['sex'])&&isset($_POST['category'])&&isset($_POST['contact']))
{
	$hostel = trim($_POST['hostel']);
	
	$dob = trim($_POST['dob']);
	$email = trim($_POST['email']);
	$contact = trim($_POST['contact']);
	$sex = trim($_POST['sex']);
	
	$category = trim($_POST['category']);
	if(!empty($hostel)&&!empty($dob)&&!empty($email)&&!empty($contact)&&!empty($sex)&&!empty($category))
	{
		
		$query = "UPDATE students SET hostel = '".mysqli_real_escape_string($mysql_connect, $hostel)."', 
		
		DOB = '".mysqli_real_escape_string($mysql_connect, $dob)."', 
		email = '".mysqli_real_escape_string($mysql_connect, $email)."', 
		contact = '".mysqli_real_escape_string($mysql_connect, $contact)."',
		sex = '".mysqli_real_escape_string($mysql_connect, $sex)."', 
		
		category = '".mysqli_real_escape_string($mysql_connect, $category)."'
		WHERE username='".mysqli_real_escape_string($mysql_connect, $username)."' ";

		$query_run = mysqli_query($mysql_connect, $query);

		if($query_run = mysqli_query($mysql_connect, $query))
		{?>
			<script>
				alert('Details Entered Succesfully...Click OK');
				window.history.go(-2);
			</script>
		<?php
		}
		else
		{
			$error = 'Something went wrong. Try again later.';
		}		
	}
	else
	{
		$error = 'All fields are required.';
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TUOR</title>
		<link rel="stylesheet" type="text/css" href="resources/styles.css">
		<style>
			#left{
				display:inline-block;
				width:45%;
				margin:10px 10px 10px 30px;
				padding:10px 50px 10px 50px;
			}
			#right{
				float:right;
				width:45%;
				margin:10px 30px 10px 10px;
				padding:10px 10px 10px 90px;
			}
			input[type=text]{
				width: 90%;
				padding: 10px 15px;
				margin: 8px 0;
				border:none;
				height:35px;
				border-radius:6px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7);
			}
			input[type=submit]{
				background-color: #EFC050;
				border-radius: 8px;
				color: white;
				padding: 8px 32px;
				text-decoration: none;
				margin: 4px 530px;
				cursor: pointer;
				font-size:16px;
				font-weight:bold;
				height:40px;
			}
			input[type=submit]:hover{
				background-color: white;
				color: #EFC050;
			}
			
			.button{
				background-color:#EFC050;
				color:white;
				text-align:center;
				width:200px;
				height:40px;
				border-radius:6px;
				padding:10px;
				align:center;
				margin:60px 50px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7);
			}
			.button a{
				text-decoration:none;
				color:inherit;
			}
			.button:hover{
				background-color:white;
				color:#EFC050;
				cursor:pointer;
			}
			#out{
				display:inline;
				right:0;
			}
		</style>
	</head>
	
	<body>

		<div class="header">
			<img src="resources/logo2.png" alt="logo">
			<h1 style="margin-bottom:0px;"><a href="http://www.tezu.ernet.in/dcompsc/" target="_blank">CSE Department Online Registration</a></h1>
			<h3><a href="http://www.tezu.ernet.in/" target="_blank">TEZPUR UNIVERSITY</a></h3>
		</div>

		<div class="row">
			
			<div class="col-1">
			</div>

			<div class="col-2">
				<br>
				<h3 style="display:inline-block;">Welcome <?php echo $fullname; ?></h3>
			
				<h3>Fill out the Following Details</h3>
				<form action="details.php" id="form3" method="POST">
					<div id="left">
						Hostel<br>
						<input type="text" name="hostel"><br><br>
						Date of Birth<br>
						<input type="text" name="dob"><br><br>
						E-mail Id<br>
						<input type="text" name="email"><br><br>
						
					</div>
					
					<div id="right">
						Sex<br>
						<input type="text" name="sex"><br><br>
						Category<br>
						<input type="text" name="category"><br><br>
						Contact No.<br>
						<input type="text" name="contact"><br><br>
						
					</div>
					<input type="submit" value="Submit">
				</form>
				<p><strong><?php echo ((isset($error) && $error != '') ? $error : ''); ?></strong></p>
				
			</div>

			<div class="col-1">
			</div>

		</div>
			
		<br>
		<div class="footer">
			<p>© 2017 Tezpur University</p>
		</div>

	</body>
	
</html>
