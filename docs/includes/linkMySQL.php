<?php
	function error($call)
	{
		echo "<script>window.location = 'error.php?err=$call';</script>";
	}
	
	function linkMySQL()
	{
		@mysql_connect('mysql.hostinger.in', 'u156801067_udit', 'logond@123') or mysql_connect('localhost', 'root', '') or die(error('Could not connect to MySQL...'));
		@mysql_select_db('u156801067_db') or mysql_select_db('insync_db') or die(error('Could not select database...'));
	}
?>