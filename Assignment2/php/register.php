<?php
  session_start();

  $user =  $_POST["userInput"];
  $pw = $_POST["passwordInput"];
  $secQuest = $_POST["securityQuestion"];
  $secAns = $_POST["securityAnswer"];

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

  $pw = crypt($pw, '$6$rounds=5000$banana$');
  $secAns = crypt($secAns, '$6$rounds=5000$apple$');


  $query = "INSERT INTO user_info VALUES ('$user', '$pw','$secQuest','$secAns')";

  $result = $conn->query($query);
  if ($result) {
    $_SESSION["Message"] = "Account created, you can now login!";
  } else {
    $_SESSION["Message"] = "Something went wrong! Please try again with another username!";
  }
  $conn->close();
  header("Location: ../message.php");
 ?>
