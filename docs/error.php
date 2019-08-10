<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Geek Base - Error </title>
	<link rel="stylesheet" type="text/css" href="../css/error.css">
	
</head>

<body>

	<div id="left"></div>
	
	<div id="message">
		ERROR
	</div>
	
	&nbsp &nbsp &nbsp <a href="../index.php" style="font-size: 50px;">Landing Page</a>
	
	<div id="error">
		<?php
			echo $_GET['err'];
		?>
	</div>
	
</body>

</html>