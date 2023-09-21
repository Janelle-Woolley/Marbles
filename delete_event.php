<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> DELETE EVENT - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
	
	include '../marbles_mysqli.php';
	
		$delete_event = "DELETE FROM events WHERE event_id='$_GET[event_id]'";
		
		if(!mysqli_query($conn, $delete_event))
		{
			echo 'Not Deleted';
		}
		else
		{
			echo 'Deleted';
		}
		
		header("refresh:2; url = admin.php");
		
	?>
	</body>
