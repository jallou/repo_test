<?php
	//Create connection to db 
	$server_name = "localhost";
	$user_name = "root";
	$password = "";
	$db_name = "university_of_omaha";
	$con = mysqli_connect($server_name,$user_name, $password,$db_name);
	if($con->connect_error){
		die(":(".$con->connect_error);
	}
	else{
		echo"Connected to db";
	}
	//Create tables for the db
	$my_tb = "CREATE TABLE users(
		id INT(20) AUTO_INCREMENT PRIMARY KEY,
		first_name VARCHAR(30) NOT NULL,
		last_name VARCHAR(30) NOT NULL,
		email VARCHAR(30) NOT NULL UNIQUE KEY,
		password VARCHAR(330) NOT NULL,
		regs_date TIMESTAMP NOT NULL,
		ip VARCHAR(255) NOT NULL,
		last_logged TIMESTAMP NOT NULL,
		activated ENUM('0','1') NOT NULL DEFAULT'1'
	)";
	//Verify if it works
	if(($con->query($my_tb)) == TRUE){
		echo "tb created";
	}else{
		echo " tb :(";
	}
?>