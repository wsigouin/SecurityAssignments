<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>console.log('No User provided');</script>";
   header("Location: index.php");
}
else{
  echo "<script>console.log('Welcome back');</script>";
}
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
      <!-- Only those of ACL 2 or higher can see the ACLs of others.-->
      <?php
        if($_SESSION['acl'] >= 2){
          echo "<li><a href='acls.php'>ACL Information</a></li>";
        }
      ?>
      <li><a href="php/logout.php">Log Out</a></li>
    </ul> <br>


    <!-- output -->
    <div class="output">
      <label class="col-md-4 control-label" for="output"></label>
      <div class="col-md-4">
        <p id="output" name="output"><?php echo "Welcome: " . $_SESSION["username"]; ?></p>
        <?php
          if($_SESSION['acl'] >= 3){
            echo '<a href="php/log.txt" download>Click here to download latest log</a>';
          }
        ?>

      </div>
    </div>


  </body>
</html>
