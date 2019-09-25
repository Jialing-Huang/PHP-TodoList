<?php // logout.php
	//require ("includes/function.php");
	// reset session variables
	// TODO - remove all cookies
	// redirect to login

	session_start();
	session_unset(); // $_SESSION = array();
	session_destroy(); // kills the session

	header("Location: index.php");

?>