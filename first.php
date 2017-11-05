
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TUOR</title>
		<link rel="stylesheet" type="text/css" href="resources/styles.css">
		<style>
			.col-2{
				display:inline-block;
			}
			.parts{
				float:left;
				width:22%;
				padding:15px 20px;
				margin:10px 17px;
				border-top:2px solid black;
				border-bottom:2px solid black;
				height:275px;
				border-radius:6px;
			}
			.button{
				background-color:#EFC050;
				color:white;
				text-align:center;
				width:190px;
				height:40px;
				border-radius:6px;
				padding:10px;
				align:center;
				margin:50px 20px;
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
			.parts p{
				text-align:center;
				font-weight:bold;
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
				<div class="button" id="out">
					<a href="logout.php"><strong>Log Out</strong></a>
				</div>
				<br><br>
				
				<div class="parts">
					<p>Step-1</p>
					<div class="button">
						<a href="details.php"><strong>Students Details</strong></a>
					</div>
					<p> - Fill out the various details</p>
				</div>
				
				<div class="parts">
					<p>Step-2</p>
					<div class="button">
						<a href="resources/BANK_CHALLAN_FORM.pdf" download><strong>Print Challan</strong></a>
					</div>
					<p> - Print Bank Challan Form</p>
				
				</div>

				<div class="parts">
					<p>Step-3</p>
					<div class="button">
						<a href="coursereg.php"><strong>Course Registration</strong></a>
					</div>
					<p> - Do the course Registration</p>
				
				</div>
				
				<div class="parts">
					<p>Step-4</p>
					<div class="button">
						<a href="appprint.php" target="_blank"><strong>Print Application</strong></a>
					</div>
					<p> - Print the filled Registration Form</p>
				
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