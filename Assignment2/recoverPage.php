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
    <script src= "js/functions.js"></script>



    <script src= "js/enc-base64.js"></script>
  </head>
  <body>
    <form name ="loginForm" class="form-horizontal" action = "php/recover.php" method = "POST">
    <fieldset>

    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="registerPage.php">Register</a></li>
    </ul> <br>
    <!-- Plaintext input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="userInput">Username:</label>
      <div class="col-md-4">
      <input id="userInput" name="userInput" type="text" placeholder="<?php echo $_SESSION["message"]?>" class="form-control input-md" required="">

      </div>
    </div>



    <!-- Submit that shit -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Recover</button>
      </div>
    </div>




    </fieldset>
    </form>
  </body>
</html>
