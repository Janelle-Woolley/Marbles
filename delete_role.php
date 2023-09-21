<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> DELETE ROLE - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
	
	include '../marbles_mysqli.php';
	
		$delete_role = "DELETE FROM roles WHERE roles_id='$_GET[roles_id]'";
		
		if(!mysqli_query($conn, $delete_role))
		{
			echo 'Not Deleted'.mysqli_error($conn);
		}
		else
		{
			echo 'Deleted';
		}
		
		header("refresh:2; url = admin.php");
		
	?>
	</body>
