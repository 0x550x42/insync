<?php
	require 'includes/linkMySQL.php';
	linkMySQL();
	
	$user = $_COOKIE['cn_user'];
	$data = mysql_fetch_assoc(mysql_query("select * from insync_user_details where username='$user'"));
	$uid = $data['uid'];
	
	if($user == "user1")
		$local="local_1";
	else
		$local="local_2";
	
	$rows = mysql_num_rows(mysql_query("select * from $local"));
	
	if($rows < 1) //table empty
	{
		/*Copy all data from remote phonebook into local phonebook*/
		mysql_query("insert into $local select uid,name,contact_number from insync_user_details where uid=(select rid from insync_phonebook where uid='$uid')");
		echo "<script>window.location='contacts.php'</script>";
	}
	else
	{		
		/*Only check for updated field values in remote phonebook and update against uid in local phonebook*/
		$arr=array();
		$query = "select * from insync_phonebook where uid='$uid' and updated=1";
		$data = mysql_query($query);
		while($object = mysql_fetch_object($data))
		{
			$arr[]=$object;
		}
		if(!empty($arr))
		{
			foreach($arr as $o)
			{
				mysql_query("update $local set contact_number=(select contact_number from insync_user_details where uid='$o->rid') where uid='$o->rid'");
				mysql_query("update insync_phonebook set updated='0' where uid='$uid' and rid='$o->rid'");
			}
		}
		else
		{
			echo "<script>window.location='contacts.php'</script>";
		}
		echo "<script>window.location='contacts.php'</script>";
	}
?>