<!DOCTYPE html>

<?php

	if(isset($_COOKIE['cn_user']) && $_COOKIE['cn_user'] != "") //user logged in
	{
		$target1 = "docs/user.php";
		$target2 = "docs/logout.php";
		$label1 = $_COOKIE['cn_user'];
		$label2 = "Logout";
	}

	else
	{
		$target1 = "docs/login.php";
		$target2 = "docs/register.php";
		$label1 = "Login";
		$label2 = "Register";
	}
	
?>

<html lang="en">

<head>
	<title> InSync - Landing Page </title>
	<noscript><meta http-equiv="refresh" content='0; url=docs/error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="../index.php">click here</a> to return to the home page.'></noscript>
	
	<!-- meta stuff -->
	<meta charset="UTF-8">
	<meta name="author" content="Udit Bhatnagar">
	<meta name="description" content="">
	<meta name="keywords" content="sync | insync | contact | phone">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- style sheets -->
	<link rel="stylesheet" type="text/css" href="css/global_style.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
	<header></header>
	<nav>
	<div id="content">
	
		<section>
		<div id="main_links">
			<a href="<?php echo $target1; ?>"><div id="login" class="main"><span><?php echo $label1; ?></span></div></a>
			<a href="<?php echo $target2; ?>"><div id="register" class="main"><span><?php echo $label2; ?></span></div></a>

		</div>
		</section>
		<table><td>insync</td></table>
		<section>
		<div id="sub_links">
			<a href="docs/under_construction.php"><div id="sitemap" class="sub"><span>Sitemap</span></div></a>
			<a href="docs/under_construction.php"><div id="aboutus" class="sub"><span>About Us</span></div></a>
			<a href="docs/under_construction.php"><div id="legal" class="sub"><span>Legal</span></div></a>
			<a href="docs/under_construction.php"><div id="help" class="sub"><span>Help</span></div></a>
		</div>
		</section>
	</div>
	</nav>
	<!--footer><img src="res/img/textures/foot2.png"></footer-->
	<script src="js/index.js"></script>
</body>
</html>