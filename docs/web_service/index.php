<?php
	
	require '../includes/linkMySQL.php';
	linkMySQL();
	
	function get_contacts()
	{
		$query = "select * from insync_user_details";
		$row = mysql_fetch_assoc(mysql_query($query));

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

	<title> InSync - Web Service </title>
	
</head>

<body>
	<div id="content">
		<?php 
		
			echo get_table();
			$resp['key'] = "value";
			echo json_encode($resp); 
		
		?>
	</div>
	
</body>

</html>