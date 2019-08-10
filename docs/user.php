<?php
	$user = $_COOKIE['cn_user'];
	
	require 'includes/linkMySQL.php';
	linkMySQL();
	
	$row = mysql_fetch_assoc(mysql_query(" SELECT * FROM insync_user_details WHERE username='$user' "));
	$name = $row["name"];
?>

<html>

<head>
	
	<noscript><meta http-equiv="refresh" content='0; url=error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="index.php">click here</a> to return to the home page.'></noscript>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title> InSync - User </title>
	
	<link rel="stylesheet" type="text/css" href="../css/global_style.css">
	<link rel="stylesheet" type="text/css" href="../css/user.css">
	

</head>

<body>
	
	<header><?php include 'includes/header.php';?></header>
	
	
	<div id="content">
	
		<input type="button" class="welcome" value="Hello <?php echo $name;?>. Welcome to your base!"/> <br> <br> <br>
		
		<a href="profile.php"> <input type="button" class="links" value="Profile"/></a> <br> <br>
		<a href="contacts.php"> <input type="button" class="links" value="Contacts"/> <br> <br>
		<a href="terminate.php"> <input type="button" class="links" value="Terminate Account"/> <br> <br>
		<a href="logout.php"> <input type="button" class="links" value="Logout"/> <br> <br>

	</div> <!-- #content -->

	<script src="../js/user.js"></script>

</body>

</html>