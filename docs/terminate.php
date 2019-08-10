<!DOCTYPE html>

<?php
	session_start();
	$user = $_COOKIE['cn_user'];
	//session_destroy();
	if(isset($_COOKIE['cn_user']) && $_COOKIE['cn_user'] != "") //user logged in
	{
		setcookie("cn_user", "", time() - 3600, '/'); //removing the cookie
	}
	
	require 'includes/linkMySQL.php';
	linkMySQL();
	
	if(mysql_query(" DELETE FROM `insync_user_details` WHERE `username`='$user' "))
		echo "Your account has been permanently removed from this site. Hope to see you again!";
	else
		die(error("Problem deleting account..."));
?>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<noscript><meta http-equiv="refresh" content='0; url=error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="index.php">click here</a> to return to the home page.'></noscript>
	
	<input type="button" value="Home Page" onClick="index();"/>
</head>
	
<body>
	<script src="../js/terminate.js"></script>
</body>

</html>