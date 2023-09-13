<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> LOGIN - Jelle's Marble Race </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
  	<?php
		session_start();
		
		include '../marbles_mysqli.php';
		
		$user = trim($_POST['username']);
		$pass = trim($_POST['password']);
		
		$login_query = "SELECT password FROM users WHERE username = '". $user."'";
		$login_result = mysqli_query($conn, $login_query);
		$login_record = mysqli_fetch_assoc($login_result);
		
		$hash = $login_record['password'];
		
		$verify = password_verify($pass, $hash);
		if($verify){
			$_SESSION['logged_in'] = 1;
			$_SESSION['username'] = $user;
			header("Location: home.php");
		}
		else{
			header("Location: login.php");
		}
	?>
	</body>
