<DOCTYPE html>

<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> School </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
	
	include '../marbles_mysqli.php';
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
		
	$insert_user = "INSERT INTO users (username, password) VALUES ('$username', '$bcrypt_password')";
		
	if(!mysqli_query($conn, $insert_user)){
		echo 'Account Not Added';
	}
	
	else{
		echo 'Account Registered';
	}
	
	header("refresh:2; url = home.php");
	?>
	</body>
