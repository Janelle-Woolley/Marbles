<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> UPDATE MARBLE - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
		session_start();
		include '../marbles_mysqli.php';
		
		$update_competitors = "UPDATE competitors SET competitor_name='$_POST[marble_name]', team_id='$_POST[marble_team]' WHERE competitor_id='$_POST[competitor_id]'";
		$update_competior_roles = "UPDATE competitors_roles SET roles_id='$_POST[marble_role]' WHERE competitor_id='$_POST[competitor_id]'";
		
		if(!mysqli_query($conn, $update_competitors))
		{
			echo 'Not Updated';
			header("refresh:2; url = admin.php");
		}
		
		$update_competitors_roles = "UPDATE competitors_roles SET roles_id='$_POST[marble_role]' WHERE competitor_id='$_POST[competitor_id]'";
		if(!mysqli_query($conn, $update_competitors_roles))
		{
			echo 'Not Updated';
			// TO ADD: reset the competitor back
			header("refresh:2; url = admin.php");
		} else {
			echo 'Updated';
			header("refresh:2; url = admin.php");
		}
		
	?>
	</body>
