<?php 
require 'core.inc.php';
$message="Already Registered ?";
if(!loggedin())
{
	if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_confirm'])&&isset($_POST['fullname']))
	{
		$username = trim($_POST['username']);
		
		$password = trim($_POST['password']);
		$password_again = trim($_POST['password_confirm']);
		
		$fullname = trim($_POST['fullname']);
		if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($fullname))
		{
			if(strlen($username)>10||strlen($fullname)>30)
			{
				$error = 'Please adhere to maxlength of fields.';
			}
			else
			{
				if($password!=$password_again)
				{
					$error = 'Passwords do not match.';
				}
				else
				{
					$password_hash = md5($password);
					
					$query = "SELECT username FROM users WHERE username='".mysqli_real_escape_string($mysql_connect, $username)."'";
					$query_run = mysqli_query($mysql_connect, $query);
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows>=1)
					{
						$error = 'The username '.$username.' already exists.';
					}
					else
					{
						$query1 = "INSERT INTO users VALUES ('".mysqli_real_escape_string($mysql_connect, $username)."','".mysqli_real_escape_string($mysql_connect, $password_hash)."')";
						$query2 = "INSERT INTO students VALUES ('".mysqli_real_escape_string($mysql_connect, $username)."','".mysqli_real_escape_string($mysql_connect, $fullname)."','','','','','','','','','','','')";
						$query3 = "INSERT INTO course_registered VALUES ('".mysqli_real_escape_string($mysql_connect, $username)."','','','','','','','','')";

						if($query_run1 = mysqli_query($mysql_connect, $query1) && $query_run2 = mysqli_query($mysql_connect, $query2) && $query_run3 = mysqli_query($mysql_connect, $query3))
						{
							$message="You have been Registered ".$fullname;
						}
						else
						{
							$error = 'Sorry, we couldn\'t register you at this time. Try again later.';
						}
					}
				}
			}
		}
		else
		{
			$error = 'All fields are required.';
		}
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
			.register {
				width:50%;
				color:#000000;
				float:right;
				margin:10px 20px 0px 20px;
				padding:0px 0px 5px 30px;
			}
			.notice {
				display:inline-block;
			}
			.notice a{
				text-decoration:none;
				color:blue;
			}
			input[type=text] ,input[type=password]{
				width: 80%;
				padding: 10px 15px;
				margin: 8px 0;
				border:none;
				height:35px;
				border-radius: 6px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7);
			}
			input[type=submit]{
				background-color: #EFC050;
				border-radius: 8px;
				color: white;
				padding: 8px 32px;
				text-decoration: none;
				margin: 4px 0px;
				cursor: pointer;
				width:35%;
				font-size:16px;
				font-weight:bold;
				height:40px;
			}
			input[type=submit]:hover{
				background-color: white;
				color: #EFC050;
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
				
				<div class="notice">
					<h3>Welcome</h3>
					<p><strong>Note : </strong>Your username should be your Enrollment No.</p>
					<p>Fill out the form for students' registration.</p>
					<br>
					<br>
					<p><strong><?php echo ((isset($message) && $message != '') ? $message : ''); ?></strong></p>
					<p>Click here to <a href="index.php"><strong>Log in</strong></a></p>					
				</div>
				
				<div class="register">
					<form action="stureg.php" id="form2" method="POST">
					  Full Name<br>
					  <input type="text" name="fullname"><br><br>
					  User Name<br>
					  <input type="text" name="username"><br><br>
					  Password<br>
					  <input type="password" name="password"><br><br>
					  Re-enter Your Password<br>
					  <input type="password" name="password_confirm"><br><br>
					  <input type="submit" value="Register">
				   </form>
				   <br><?php echo ((isset($Error) && $Error != '') ? $Error : ''); ?>
				</div>
					
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