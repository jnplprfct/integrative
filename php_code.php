<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'integrative.db');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

	if (isset($_POST ['update'])) {
		$name = mysql_real_escape_string($_POST['name']);
		$address = mysql_real_escape_string($_POST['address']);
		$id = mysql_real_escape_string($_POST['id']);
	}
	$results = mysqli_query($db, "SELECT * FROM information");
