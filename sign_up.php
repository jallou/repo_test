<!DOCTYPE>
<html>
	<head>
	<head lang="en">
			<meta charset="utf-8"> 
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!--Got some fonts from google to enhance how the website looks-->
			<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Oxygen:700' rel='stylesheet' type='text/css'>
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<!-- Latest compiled JavaScript -->
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<style>
			body, html{
				margin : 0% 0% 0% 0%;
				width: 100%;
				height: 100%;
			}
			.error_message{
				color : red;
				font-weight: bold;
			}
			p{
				color: #000000;
				font-family: "Oxygen", sans-serif; 
				font-size: 130%; 
				margin-top: 4%; 
				margin-bottom: 0%;
			}
			#form_it{
				padding-left: 5%;
				padding-right: 2%;
				padding-top:2%;
				margin-left:auto;
				margin-right: auto;
			}
		</style>
		<?php
					//Make my variables empty so the post method can populate them
					$first_name = "";
					$last_name = "";
					$email_name = ""; 
					$first_name_error = " ";
					$last_name_error = " ";
					$email_name_error = " ";
					$user_password_error = " ";
					$check1 = FALSE;
					$check2 = FALSE;
					$check3 = FALSE;
					$check4 = FALSE;
					//This code assigns the values posted by my form to the password
					$user_password = $_POST["user_password"];
					$user_password_confirm = $_POST["user_password_confirm"];
					//This code is a method to strip all unnecessary off the data
					if ($_SERVER["REQUEST_METHOD"] == "POST"){
						//code to make sure the passwords match
						if($user_password != $user_password_confirm){
							$user_password_error = "Your Passwords do not match";
						}elseif(empty($user_password)){
							$user_password_error = "*a Password is required";
						}else{
							$check1 = TRUE;
						}
						if(empty($_POST["first_name"])){
							$first_name_error = "*Your First Name is required"; 
						}else{
							$first_name = test_form_input($_POST["first_name"]);
							$check2 = TRUE;
						}
						if(empty($_POST["last_name"])){
							$last_name_error = "*Your Last Name is required";
						}else{
							$last_name = test_form_input($_POST["last_name"]);	
							$check3 = TRUE;
						}
						if(empty($_POST["email_name"])){
							$email_name_error = "*Your email is required";
						}else{
							$email_name = test_form_input($_POST["email_name"]);
							$check4 = TRUE;
						}
					}
					function test_form_input($data){
						$data = stripslashes($data);
						$data = trim($data);
						$data = htmlspecialchars($data);
						return $data;
					}
					if($check1&&$check2&&$check2&&$check4== TRUE){
						//Connect to the database
						//declare my variables
						$server_name = "localhost";
						$user_name = "root";
						$password = "";
						$db_name = "university_of_omaha";
						//Actually query the connection
						$con = new mysqli($server_name, $user_name,$password , $db_name);
						if($con -> connect_error){
							die("Shoot".$con->connect_error);
						}
						//The Script that adds them to the database
						$sign_up = "INSERT INTO users (first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email_name', '$user_password')";
						if($con->query($sign_up) == TRUE){
							$first_name_error= "YO";
						}else{
							$first_name_error="Sign up unsuccessful";
						}
					}
				?>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand text-danger" style="font-family:'Pacifico';color: #FFFFFF; font-size: 350%;">vivlio</a>
				<ul class="nav navbar-nav navbar-right container-fluid dropdown">
					<li  class="dropdown-toggle">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-family:'Oxygen';"> Menu<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="#"><span class="glyphicon glyphicon-log-in"></span>  Log In</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-pencil"></span>  Sign Up</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-play-circle"></span>  How It Works</a></li> 
					  </ul>
					</li>
				</ul>
			</div>
		</nav>
		<br>
		<br>
		<div class="container-fluid text-center" style="background-color: #B80000;">
			<br>
			<h1 style="font-family:'Pacifico'; color: #FFFFFF;">Register Now! It's Simple and fast</h1> 
			<h3 style="font-family:'Raleway'; color: #FFFFFF;">and Start Saving LOTS of money on Textbooks</h3>  
			<br>
			<br>
		</div>
		<div class="container-fluid text-center">
			<form role="form" class="form-horizontal">
					<br>
					<h1 style="font-family:Oxygen; font-size:270%; margin-top:0%;margin-bottom: 5%;float: top;">It'll Take you like, 2 seconds, Maybe 3</h1>
						<div class="form-group">
							<label class="control-label col-lg-5" for="first_name" style="font-size: 150%; font-family: 'Oxygen';">First Name:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control input-lg" id="first_name" placeholder="First Name">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-5" for="last_name" style="font-size: 150%; font-family: 'Oxygen';">Your University:</label>
							<div class="col-sm-4">
								<select class="form-control input-lg" id="">
									<option disabled selected>Select Your University</option>
									<option>University of Nebraska at Omaha</option>
									<option>University of Nebraska at Lincoln</option>
									<option>Creighton University</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-5" for="last_name"style="font-size: 150%; font-family: 'Oxygen';">Your University(.edu) Email:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control input-lg" id="last_name" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-5" for="last_name"style="font-size: 150%; font-family: 'Oxygen';">Password:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control input-lg" id="last_name" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-5" for="last_name"style="font-size: 150%; font-family: 'Oxygen';">Confirm Password:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control input-lg" id="last_name" placeholder="Confirm Password">
							</div>
						</div>
						
			</form>
			<br>
			<br>
			<br>
		</div>
		<div class="container-fluid" style="background-color: #CCCCCC; margin:0;">
			<div class="text-center">
				<h2 style="font-family:'Oxygen';">More Students = More Books = More Trade = CHEAP BOOKS</h2>
				<h3 style="font-family:'Raleway';">So please Share The Word!</h3>
				<img src="pictures/share_logo/fb.png"/>
				&nbsp; 
				<img src="pictures/share_logo/gg.png"/>
				&nbsp; 				
				<img src="pictures/share_logo/tt.png"/>
				&nbsp; 
				<img src="pictures/share_logo/yt.png"/>
				<br>
				<br>
				<br>
			</div>
		</div>
	</body>
</html>