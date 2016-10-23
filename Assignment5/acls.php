<?php session_start();
if(!isset($_SESSION['username']) || $_SESSION['acl'] <2){
  echo "<script>console.log('Invalid user info');</script>";
   header("Location: index.php");
}
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

$sql = "SELECT username, acl FROM user_info";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Secure Log In </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src= "js/jquery-3.1.0.min.js"></script>
    <script src= "js/bootstrap.min.js"></script>

  </head>
  <body>
    <ul>
      <li><a href="index.php">Home</a></li>
      <?php
        if($_SESSION['acl'] >= 2){
          echo "<li><a href='acls.php'>ACL Information</a></li>";
        }
      ?>
      <li><a href="php/logout.php">Log Out</a></li>

    </ul> <br>
    <!-- This is disgusting but it prevents from ACL lvl 2 users from getting to edit -->
  <?php
    if($_SESSION['acl'] == 3){
      echo '
    <form class="form-horizontal" action = "php/changeAcl.php" method = "POST">
      <fieldset>

      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Username</label>
        <div class="col-md-4">
        <input id="userInput" name="userInput" type="text" placeholder="username" class="form-control input-md" required="">

        </div>
      </div>


      <div class="form-group">
        <label class="col-md-4 control-label" for="">Action</label>
        <div class="col-md-8">
          <button id="promote" name="promote" class="btn btn-success" >Promote</button>
          <button id="demote" name="demote" class="btn btn-danger">Demote</button>
        </div>
      </div>

      </fieldset>
    </form>

    <div class="output">
      <label class="col-md-4 control-label" for="output"></label>
      <div class="col-md-4">
        <p id="output" name="output"><?php echo $_SESSION["DBEditMessage"]?></p>
      </div>
    </div>';
    }
    ?>

    <!-- output -->
      <table class="table table-striped table-inverse">
        <label class="col-md-4 control-label" for="table"></label>
          <thead style="background-color: darkgrey">
            <tr>
              <th>Username</th>
              <th>ACL</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $count = 1;
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "  <tr>
                          <td style='width:10%'>". $row["username"]. "</td>
                          <td style='width:10%'>". $row["acl"]. "</td>
                        </tr>
                      ";
              }
          } else {
            echo "0 results";
          }

          ?></p>
      </tbody>
      </table>


  </body>
</html>
