<?php 
if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($username) && !empty($password))
	{
		$password_hash = md5($password);
		$query = "SELECT username FROM users WHERE username='".mysqli_real_escape_string($mysql_connect, $username)."' AND password='".mysqli_real_escape_string($mysql_connect, $password_hash)."'";
		if($query_run = mysqli_query($mysql_connect, $query))
		{
			$query_run = mysqli_query($mysql_connect, $query);
			
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0)
			{
				$Error =  'Invalid username/password.';
			}
			else if($query_num_rows==1)
			{
				$query_row = mysqli_fetch_assoc($query_run);
				$user_name = $query_row['username'];
				$_SESSION['user_name'] = $user_name;
				header('Location: index.php');
			}
		}
	}
	else
	{
		$Error = "You must enter a username or password";
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
			input[type=text] ,input[type=password]{
				width: 100%;
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
			.gallery {
				color:#000000;
				height:350px;
				width:58%;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7);
				display:inline-block;
				margin:0px 10px 0px 0px;
			}

			.start {
				color:#000000;
				height:350px;
				width:35%;
				float:right;
				margin:10px 20px 0px 20px;
				padding:30px 0px 5px 30px;
			}
			.start a{
				text-decoration:none;
				color:blue;
			}
			.start p{
				float:right;
				left:0;
			}
			#form{
				display:inline;
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
				
				<div class="gallery">
				  <img src="resources/cse.jpg" style="width:100%;height:350px">
				</div>
				
				<div class="start">
				  <form action="<?php echo $current_file ?>" method="POST" id="form">
					  User name<br>
					  <input type="text" name="username"><br><br>
					  
					  Password<br>
					  <input type="password" name="password"><br><br>
					  
					  <input type="submit" value="Login">
				   </form>
				   <p>New Students <a href="stureg.php">Click Here</a></p><br>
				   
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
