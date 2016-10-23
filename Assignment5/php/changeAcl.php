<?php
session_start();
  $user =  $_POST["userInput"];


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

	$sql = "SELECT * FROM user_info WHERE username = '$user'";
	$result = $conn->query($sql);
  if($user == "admin"){
    $_SESSION["DBEditMessage"] = "Cannot change admin status. Why are you trying to break the system?";
  }
	else if ($result->num_rows == 1) {
    $_SESSION["DBEditMessage"] = "Change Completed";
    if(isset($_POST['demote'])){
      $sql = "UPDATE user_info SET acl = '1' WHERE username = '$user'";
      $result = $conn->query($sql);
    }
    else{
      $sql = "UPDATE user_info SET acl = '2' WHERE username = '$user'";
      $result = $conn->query($sql);
    }
	} else {
    		$_SESSION["DBEditMessage"] = "No User with that username";
	}
	$conn->close();
  header("Location: ../acls.php");

 ?>
