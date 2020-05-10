<?php
session_start();

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	// Assigning POST values to variables.
	$username = $_POST['user_id'];
	$password = $_POST['user_pass'];
	
	if($_POST['user_id'] == "samfeerick" && $_POST['user_pass'] =="123456789"){
		echo "pass";
		echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
		$_SESSION['user'] = "tommy";
		header("Location: http://localhost:8080/JavaBridgeTemplate721/home.php");

	}else{
		echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
		header("Location: http://localhost:8080/JavaBridgeTemplate721/login.php");

	}
}







?>
