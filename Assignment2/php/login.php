<?php
  session_start();
  $user =  $_POST["userInput"];
  $pw = $_POST["passwordInput"];
  $pw = crypt($pw, '$6$rounds=5000$banana$');

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

	if ($result->num_rows == 1) {
    $_SESSION["Message"] = "Logged In!";
    header("Location: ../message.php");
	} else {
    		$_SESSION["Message"] = "Error loggin in try again!";
        header("Location: ../message.php");
	}
	$conn->close();

 ?>
