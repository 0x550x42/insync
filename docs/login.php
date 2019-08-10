<!DOCTYPE html>

<html>

<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<noscript><meta http-equiv="refresh" content='0; url=docs/error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="../index.php">click here</a> to return to the home page.'></noscript>
	
	<title>InSync - Login</title>
	
	<link rel="stylesheet" type="text/css" href="../css/global_style.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	
</head>

<body>
	
	<header><?php include 'includes/header.php';?></header>
	
	<div id="content">
		<br>
		Enter your details
		
		<form method="POST" action="login.php" onSubmit="return finalValidation();">
		
			<input type="text" name="uname" id="uname" placeholder="Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];?>" onKeyDown="label_focus(uname);" onBlur="label_blur(uname);"/> <br>
			<input type="password" name="pass" id="pass" placeholder="Password" value="<?php if(isset($_POST['pass'])) echo $_POST['pass'];?>" onKeyDown="label_focus(pass);" onBlur="label_blur(pass);"/> <br>
			<br>
			<input type="submit" value="Login"/> <br>
		
		</form>
	
	</div> <!-- #content -->

	<script src="../js/login.js"></script>
	
</body>

</html>

<?php

	require 'includes/linkMySQL.php';
	linkMySQL();
	
	$query = "select * from insync_user_details";
	$flag = 0;
	
	if(isset($_POST['uname']) && isset($_POST['pass']))
	{
		if($query_run = mysql_query($query))
		{
			while($query_col = mysql_fetch_assoc($query_run))
			{
				$username = $query_col['username'];
				$password = $query_col['password'];
				
				if($_POST['uname'] == $username && md5($_POST['pass']) == $password)
				{
					$flag = 1; //correct!
					break;
				}
				
				else if($_POST['uname'] == $username && md5($_POST['pass']) != $password)
				{
					$flag = 2; //this password seems to be incorrect
					break;
				}
				
				else
				{
					$flag = 3; //user not registered
					//break;
				}
			}
			
			switch($flag)
			{
				case 1: //correct!
					setcookie("cn_user", $_POST['uname'], time()+31557600, '/'); //1 year
					
					echo '<script>window.location = "user.php";</script>';
					break;
					
				case 2: //this password seems to be incorrect
					echo'
					<script>
						pass.style.background = "rgba(255,0,0,0.2)";
						pass.previousSibling.style.visibility = "hidden";
						if(uname.value.length != 0) uname.previousSibling.style.visibility = "hidden";
					</script>
					';
					break;
					
				case 3:	//user not registered
					echo '
					<script>
						uname.style.background = "rgba(255,0,0,0.2)";
						uname.previousSibling.style.visibility = "hidden";
						if(pass.value.length != 0) pass.previousSibling.style.visibility = "hidden";
					</script>
					';
					break;
				
				default:
					die(error("Flag value incorrect on login.php"));
			}
			
		}
		
		else
		{
			die(error("MySQL query could not be executed..."));
		}
	}
?>