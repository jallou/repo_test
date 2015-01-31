<?php
	//This creates the connection
	$server_name = "localhost";
	$user_name = "root";
	$password = "";
	//Here it creates the connection
	$con = new mysqli($server_name, $user_name, $password);
	//Check to see if it connected
	if($con->connect_error){
		die(":(".$con->connect_error);
	}
	else{
		echo "Connected:)";
	}
	//This creates the DB
	$sql_db = "CREATE DATABASE university_of_omaha";
	if($con->query($sql_db) == TRUE){
		echo"Database Created";
	}else{
		echo"There was a problem creating db";
?>