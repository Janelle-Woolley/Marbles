<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> ADD MARBLE - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
	<!-- opens php -->
	<?php
		session_start();
		include '../marbles_mysqli.php';
		
		$competitor_name = $_POST['marble_name'];
		$team_id = $_POST['marble_team'];
		$role_id = $_POST['marble_role'];
		
		$insert_competitors = "INSERT INTO competitors (competitor_name, team_id) VALUES ('$competitor_name', '$team_id')";
		
		if(!mysqli_query($conn, $insert_competitors)){
			echo 'Unable to add Marble';
			header("refresh:5; url = home.php");
		}
		
		$competitor_id_query = "SELECT competitor_id FROM competitors WHERE competitor_name = '$competitor_name'";
		$competitor_id_result = mysqli_query($conn, $competitor_id_query);
    	$competitor_id_record = mysqli_fetch_assoc($competitor_id_result);
		$competitor_id = $competitor_id_record['competitor_id'];
		
		$insert_competitors_roles = "INSERT INTO competitors_roles (competitor_id, roles_id) VALUES ('$competitor_id', '$role_id')";
		
		if(!mysqli_query($conn, $insert_competitors_roles)){
			echo 'Unable to add Marble';
			// add delete competitor because we don't want a competitor without a role
		} else {
			echo 'Marble Added';
		}
		
		header("refresh:2; url = home.php");
		
	?>
	</body>
