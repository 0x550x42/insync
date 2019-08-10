<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<noscript><meta http-equiv="refresh" content='0; url=error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="index.php">click here</a> to return to the home page.'></noscript>

	<title> InSync - Registration </title>

	<link rel="stylesheet" type="text/css" href="../css/global_style.css">
	<link rel="stylesheet" type="text/css" href="../css/register.css">

</head>

<!--
Minor function call numbers:-

0. nothing else
1. isNumeric
2. isAlphabet
3. isAlphanumeric
4. confirmPass
5. emailValidator

Note: minorCall argument needs to be sent in case you want to call a minor function else not.
-->

<body>

	<header><?php include 'includes/header.php'?></header>
	
	<div id="content">

		<form method="POST" action="register.php" onSubmit="return finalValidation();">
		
<!-- ******************************************************************************************************************************************************************************************************************************************************************************************************************** -->
			
			<br><h2>Login Details</h2>
			
			<input type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" onFocus="label_focus(username);" onBlur="notEmpty(username); label_blur(username);"> <br>
			<input type="password" name="password" id="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>" onFocus="label_focus(password);" onBlur="notEmpty(password); label_blur(password);"> <br>
			<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" value="<?php if(isset($_POST['cpassword'])) echo $_POST['cpassword'];?>" onFocus="label_focus(cpassword);" onBlur="notEmpty(cpassword, 4, password); label_blur(cpassword);"> <br> <br>
			
<!-- ******************************************************************************************************************************************************************************************************************************************************************************************************************** -->
			<h2>Personal Details</h2>

			<input type="text" name="name" id="name" placeholder="Name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>" onFocus="label_focus(name);" onBlur="notEmpty(name); label_blur(name);"> <br>
			<input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" value="<?php if(isset($_POST['contact_number'])) echo $_POST['contact_number'];?>" onFocus="label_focus(contact_number);" onBlur="label_blur(contact_number);"> <br><br>

<!-- ******************************************************************************************************************************************************************************************************************************************************************************************************************** -->

			<input name="submit" id="submit" type="submit" value="Register"/>

		
		</form>
		<br><br>
		
	</div> <!-- Content -->

	<script src="../js/register.js"></script>
	
</body>

</html>

<?php
	require 'includes/linkMySQL.php';
	linkMySQL();
	
	function randStrGen($len){
		$result = "";
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		$charArray = str_split($chars);
		for($i = 0; $i < $len; $i++){
			$randItem = array_rand($charArray);
			$result .= "".$charArray[$randItem];
		}
		echo $result;
		return $result;
	}

	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['contact_number']))
	{	
		$uid = randStrGen(5);
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$name = $_POST['name'];
		$contact_number = $_POST['contact_number'];
		
		$query = "select * from insync_user_details where username='$username'";
		$query_run = mysql_query($query);
		$rows = mysql_num_rows($query_run);

		if($rows >= 1) //username already exists in the database
		{
			echo '
			<script>
				username.focus();
				username.style.background = "rgba(255,0,0,0.2)";
			</script>';
		}
			
		else //username is valid
		{	
			$query="insert into insync_user_details values ('$uid','$username','$password','$name','$contact_number')";
			if(!mysql_query($query))
				die(error(mysql_error()));
			
			echo '<script>window.location = "register_success.php";</script>';
		}
	}
?>