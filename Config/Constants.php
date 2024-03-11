<?php
	session_start();

	//define('SITEURL','http://localhost/Student%20registration/');
	$server = 'localhost';
	$username = 'root';
	$password = ''; // Corrected the variable name from 'pasword' to 'password'
	$database = 'studentregistration';

	$conn = mysqli_connect($server, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	// "Connected successfully"; // This line was not doing anything

	// session_close(); // This should be session_destroy();
?>