<?php
    $username = $_POST["username"];
	$password = $_POST["password"];
	
	$conn = new mysqli("localhost", "root", "root", "academics");
	
	if(!$conn) {
		die("Error while connecting to database");
	}

	$query = "SELECT password FROM admins WHERE username = '$username'";
	$verify = "SELECT username FROM admins WHERE password = '$password'";
	
$resultset = $conn->query($query);
$result_row = $resultset->fetch_assoc();

$got_pass = $result_row['password'];
$resultset = $conn->query($verify);

$result_row = $resultset->fetch_assoc();
$got_user = $result_row['username'];

	if($got_pass == $password && $got_user == $username){
		echo("Login Successfull!");
	}else {
		echo("Login failed!");
	}

?>
