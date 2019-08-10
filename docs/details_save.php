<?php
	require 'includes/linkMySQL.php';
	linkMySQL();
	$user = $_COOKIE['cn_user'];
	
	if(isset($_POST["new"]))
	{
		$new = $_POST["new"];
		$data = mysql_fetch_assoc(mysql_query("select * from insync_user_details where username='$user'"));
		$uid = $data["uid"];
		if(mysql_query("update insync_user_details set contact_number='$new' where username='$user'") and mysql_query("update insync_phonebook set updated='1' where rid='$uid'"))
		{
			echo "<script>window.location='profile.php'</script>";
		}
		else
		{
			die(error("Unable to execute SQL query.."));
		}
	}
	else
	{
		echo "<script>window.location='profile.php'</script>";
	}
?>