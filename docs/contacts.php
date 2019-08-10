<?php
	/*DISPLAY LOCAL PHONEBOOK*/
	require 'includes/linkMySQL.php';
	linkMySQL();
	
	function get_contacts()
	{
		$user = $_COOKIE['cn_user'];
		
		$query = "select * from insync_user_details where username='$user'";
		$row = mysql_fetch_assoc(mysql_query($query));
		$uid = $row["uid"];
		
		if($user == "user1")
			$local="local_1";
		else
			$local="local_2";

		$query="select * from $local";

		$data=mysql_query($query);
		$contacts=array();
		
		while($object=mysql_fetch_object($data))
		{
			$contacts[]=$object;
		}	
		return $contacts;
	}
	function get_table()
	{
		$contacts=get_contacts();
		$table_str='<table>';
		$i=1;
		$table_str.='<tr>';
		$table_str.='<th>#</th><th>Name</th><th>Contact Number</th>';
		$table_str.='</tr>';
		foreach($contacts as $contact)
		{
			$table_str.='<tr>';
			$table_str.='<td>'.($i++).'</td><td>'.$contact->name.'</td><td>'.$contact->contact_number.'</td>';
			$table_str.='</tr>';
		}
		$table_str.='</table>';
		return $table_str;
	}
?>

<!DOCTYPE html>

<html>
<head>

	<noscript><meta http-equiv="refresh" content='0; url=error.php?err=JavaScript has been disabled on your browser! Please turn on JavaScript and then <a href="index.php">click here</a> to return to the home page.'></noscript>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> InSync - Contacts </title>
	
	<link rel="stylesheet" type="text/css" href="../css/global_style.css">
	<link rel="stylesheet" type="text/css" href="../css/contacts.css">
	
</head>

<body>

	<header><?php include 'includes/header.php';?></header>

	<div id="content">
		<form method="POST" action="contacts_save.php" name="add">
			<input name="uid" id="uid" type="text" placeholder="Add By UID"/>
			&nbsp
			<input id="submit" type="submit" value="Save"/>
		</form>
		OR
		<form method="POST" action="contacts_sync.php" name="sync">
			<input type="submit" value="Sync Now"/>
		</form>
		<br>
		<?php echo get_table(); ?>
	</div>
	<br><br>
</body>

</html>