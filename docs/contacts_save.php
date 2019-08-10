<?php
	$user = $_COOKIE['cn_user'];
	
	require 'includes/linkMySQL.php';
	linkMySQL();
	if(isset($_POST['uid']))
	{	
		$rid = $_POST['uid'];
		$updated = 0;
		
		/*Fetch UID of current user*/
		$query = "select * from insync_user_details where username='$user'";
		$data = mysql_fetch_assoc(mysql_query($query));
		$uid = $data["uid"];
		
		/*Check if RID already exists in the phonebook
		$arr=array();
		$query = "select * from insync_phonebook where uid='$uid'";
		$data = mysql_query($query);
		while($object=mysql_fetch_object($data))
		{
			$arr[] = $object;
		}
		foreach($obj as $o)
		{
			if($o->rid == $rid)
			{
				echo "<script>window.location='contacts.php'</script>";
			}
		}*/
		
		/*Fetch name and number of the RID provided by the user*/
		
		$query = "select * from insync_user_details where uid='$rid'";
		$data = mysql_fetch_assoc(mysql_query($query));
		$num_rows = mysql_num_rows(mysql_query($query));
		
		if($num_rows>=1)
		{
			if(mysql_query("insert into insync_phonebook values ('$uid','$rid',$updated)"))
				echo "<script>window.location='contacts.php'</script>";
			else
				die(error("Problem executing SQL query..."));
			
		}
		else
		{
			echo "<script>window.location='contacts.php'</script>";
		}
	}
	else
	{
		echo "<script>window.location='contacts.php'</script>";
	}
?>