<!DOCTYPE html>

<?php
	session_start();
	$user = $_COOKIE['cn_user'];
	
	require 'includes/linkMySQL.php';
	linkMySQL();

	$row = mysql_fetch_assoc(mysql_query(" SELECT * FROM `insync_user_details` WHERE `username`='$user' "));
	
	$uid = $row["uid"];
	$username = $row["username"];
	$name = $row["name"];
	$contact_number = $row["contact_number"];
	
?>

<html>

<head>
	
	<noscript><meta http-equiv="refresh" content='0; url=error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="index.php">click here</a> to return to the home page.'></noscript>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title> InSync - Profile </title>
	
	<link rel="stylesheet" type="text/css" href="../css/global_style.css">
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
	
	
</head>

<body>
	
	<header><?php include 'includes/header.php';?></header>
	
	<div id="content">

		<div class="titles">Your Details</div> <br>
		
		<form method="POST" action="details_save.php">
			<input name="new" id="new" type="text" placeholder="Change Number"/>
			&nbsp
			<input id="submit" type="submit" value="Update"/>
		</form>
		<br>
		
		<table>	
			
			<tr> <td class="sec1"> Unique ID: </td> <td class="sec2"> <?php echo $uid;?> </td> </tr>
			<tr> <td class="sec1"> Username: </td> <td class="sec2"> <?php echo $username;?> </td> </tr>
			<tr> <td class="sec1"> Password: </td> <td class="sec2"> <?php echo "********"?> </td> </tr>
			<tr> <td class="sec1"> Name: </td> <td class="sec2"> <?php echo $name;?> </td> </tr>
			<tr> <td class="sec1"> Contact #: </td> <td class="sec2"> <?php echo $contact_number?> </td> </tr>
			
		</table>	

	</div> <!-- content -->
	
	<script src="../js/profile.js"></script>
	
</body>

</html>