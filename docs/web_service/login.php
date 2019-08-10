<?php

	require '../includes/linkMySQL.php';
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
					$response["success"] = 1;
					$response["message"] = "Login successful!";
					echo json_encode($response);
					break;
					
				case 2: //this password seems to be incorrect
					$response["success"] = 0;
					$response["message"] = "Password incorrect!";
					echo json_encode($response);
					break;
					
				case 3:	//user not registered
					$response["success"] = 0;
					$response["message"] = "User not registered!";
					echo json_encode($response);
					break;
				
				default:
					$response["success"] = 0;
					$response["message"] = "Flag value incorrect!";
					die(json_encode($response));
			}
		}
		
		else
		{
			$response["success"] = 0;
			$response["message"] = "Problem executing SQL query!";
			die(json_encode($response));
		}
	}
?>