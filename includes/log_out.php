<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Finally, destroy the session
session_destroy();

// Redirect to the login page or home page
header("Location: ../login/login.php"); // Change to your desired redirect page
exit();
?>
