<?php
	require '../includes/linkMySQL.php';
	linkMySQL();
	
	$name = $_POST['name'];
	$status = mysql_query("insert into insync_user_details (name) values ('$name')");
	
	if($status){
		$response['status'] = 1;
		$response['message'] = "Row inserted successfully";
	}
	else{
		$response['status'] = 0;
		$response['message'] = "Unable to insert row";
	}
	echo json_encode($response);
?>