<?php
    $user =  $_POST["userInput"];
  	$pw = $_POST["passwordInput"];

	$servername = "localhost";
	$username = "root";
	$password = "Acc0unt$2";
	$dbname = "login_information";


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM user_info WHERE username = '$user' AND passHash = '$pw'";
	$result = $conn->query($sql);
	echo "hello";

	if ($result->num_rows == 1) {
   	echo "Logged In!!";
	} else {
    		echo "Get Outta HERE";
	}
	$conn->close();

 ?>
