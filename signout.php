<?php
// start the session
session_start();

// unset all session variables
session_unset();
unset($_SESSION['logged_in']);

// destroy the session
session_destroy();

// redirect the user to the login page
header("Location: index.php");
exit();
   
?> 