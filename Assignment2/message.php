<?php session_start(); ?>
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
      <li><a href="registerPage.php">Register</a></li>
    </ul> <br>


    <!-- output -->
    <div class="output">
      <label class="col-md-4 control-label" for="output"></label>
      <div class="col-md-4">
        <p id="output" name="output"><?php echo $_SESSION["Message"]?></p>
      </div>
    </div>


  </body>
</html>
<?php session_destroy(); ?>
