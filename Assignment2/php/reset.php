<?php
  session_start();

  //MSQL does not like session vars in the SQL statements for some reason.
  $secAns = $_POST["securityAnswer"];
  $newPw = $_POST["passwordInput"];
  $user = $_SESSION["user"];

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


  $secAns = crypt($secAns, '$6$rounds=5000$apple$');

	$sql = "SELECT * FROM user_info WHERE username = '$user' AND secAns = '$secAns'";

  $result = $conn->query($sql);

  if($result->num_rows == 1){
    $newPw = crypt($newPw, '$6$rounds=5000$banana$');
    $sqlUpdate = "UPDATE user_info SET passHash = '$newPw' WHERE username = '$user' AND secAns = '$secAns'";
    $result = $conn->query($sqlUpdate);
    if($result){
      $_SESSION["Message"] = "Success! You can now login with your new password!";
    }
    else{
      $_SESSION["Message"] = "Something went wrong! Password not changed! 001"; //error codes for debugging
    }
  }
  else {
      $_SESSION["Message"] = "Something went wrong! Password not changed! 002";//error codes for debugging
  }

	$conn->close();
  header("Location: ../message.php");
 ?>
