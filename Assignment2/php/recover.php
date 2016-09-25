<?php
  session_start();
  $_SESSION["user"] =  $_POST["userInput"];
  //MSQL does not like session vars in the SQL statements for some reason.
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


	$sql = "SELECT * FROM user_info WHERE username = '$user'";

  $result = $conn->query($sql);

	if ($result->num_rows == 1) {
    while($row = mysqli_fetch_assoc($result)) {
      $securityQuestion = $row["secQuest"];
    }
    switch ($securityQuestion){
      case "1":
        $_SESSION["secQuest"] = "Mother's Maiden Name?";
        break;
      case "2":
        $_SESSION["secQuest"] = "Favourite Teacher?";
        break;
      case "3":
        $_SESSION["secQuest"] = "First Pet?";
        break;
      case "4":
        $_SESSION["secQuest"] = "Favourite Sports Team?";
        break;
      case "5":
        $_SESSION["secQuest"] = "Hometown?";
        break;
    }
    echo $_SESSION["secQuest"];
    $_SESSION["message"] = "";
      header("Location: ../resetPage.php");
	} else {
    	$_SESSION["message"] = "Invalid Username";
      header("Location: ../recoverPage.php");
	}

	$conn->close();

 ?>
