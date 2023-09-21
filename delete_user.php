<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> DELETE USER - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
	
	include '../marbles_mysqli.php';
	
		$delete_user = "DELETE FROM users WHERE user_id='$_GET[user_id]'";
		
		if(!mysqli_query($conn, $delete_user))
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
