<?php
  session_start();
  $user =  $_POST["userInput"];
  $pw = $_POST["passwordInput"];
  $pw = crypt($pw, '$6$rounds=5000$banana$');
  $ip = $_SERVER['REMOTE_ADDR'];

  $servername = "localhost";
	$username = "root";
	$password = "Acc0unt$2";
	$dbname = "login_information";

  $log = 'log.txt';
  $record = $user ." ". date('Y-m-d') ." ". time() ." ". $ip;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM user_info WHERE username = '$user' AND passHash = '$pw'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
    $_SESSION['username'] = $user;
    $row = $result->fetch_assoc();
    $_SESSION['acl'] = $row['acl'];
    header("Location: ../main.php");
    $record = $record ." 1\n";
	} else {
    		$_SESSION["Message"] = "Error loggin in try again!";
        header("Location: ../regMessage.php");
        $record = $record ." 0\n";
	}
  file_put_contents($log, $record, FILE_APPEND);
	$conn->close();

 ?>
