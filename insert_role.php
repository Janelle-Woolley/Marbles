<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> ADD TEAM - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
	<!-- opens php -->
	<?php
		session_start();
		include '../marbles_mysqli.php';
		
		$role = $_POST['role_name'];
		$description = $_POST['description'];

		$insert_role = "INSERT INTO roles (role, description) VALUES ('$role', '$description')";
		
		if(!mysqli_query($conn, $insert_role)){
			echo 'Unable to add Role';
			header("refresh:5; url = home.php");
		} else {
			echo 'Role Added';
			header("refresh:2; url = home.php");
		}
		
	?>
	</body>
