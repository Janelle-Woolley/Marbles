<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> UPDATE ROLE - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
		session_start();
		include '../marbles_mysqli.php';
		
		$update_roles = "UPDATE roles SET role='".$_POST['role']."', description='".$_POST['description']."' WHERE roles_id='".$_POST['roles_id']. "'";
		
		if(!mysqli_query($conn, $update_roles))
		{
			echo 'Not Updated';
			header("refresh:2; url = admin.php");
		} else {
			echo 'Updated';
			header("refresh:2; url = admin.php");
		}
		
	?>
	</body>
