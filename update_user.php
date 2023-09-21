<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> UPDATE USER - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
		session_start();
		include '../marbles_mysqli.php';
		
		$update_user = "UPDATE users SET rank='".$_POST['rank']."' WHERE user_id='".$_POST['user_id']."'";
		
		if(!mysqli_query($conn, $update_user))
		{
			echo 'Not Updated'.mysqli_error($conn);
			header("refresh:20; url = admin.php");
		} else {
			echo 'Updated';
			header("refresh:2; url = admin.php");
		}
		
	?>
	</body>
