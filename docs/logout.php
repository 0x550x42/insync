<!DOCTYPE html>

<?php
	if(isset($_COOKIE['cn_user']) && $_COOKIE['cn_user'] != "") //user logged in
	{
		setcookie("cn_user", "", time() - 3600, '/'); //removing the cookie
		
	}
?>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<noscript><meta http-equiv="refresh" content='0; url=error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="index.php">click here</a> to return to the home page.'></noscript>
	
</head>
	
<body>
	
	<script>window.location = "../index.php";</script>
	
</body>

</html>