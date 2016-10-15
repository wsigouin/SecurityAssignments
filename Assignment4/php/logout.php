<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['acl']);
session_unset();
session_destroy();
header("Location: ../index.php");
?>
