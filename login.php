<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> LOGIN - Jelle's Marble Runs </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
	<div class="container">
  			<div class="item">
	<?php
		include '../marbles_mysqli.php';
	?>
    <h1>Login Here</h1>
	
	<!--Login Form-->
	<form name='login_form' id='login_form' method = 'post' action = 'process_login.php'>
		<label for='username'>Username:</label>
		<input type='text' name='username'><br>
		
		<label for='password'>Password:</label>
		<input type='password' name='password'><br>
		
		<input type='submit' name='submit' id='submit' value='Log In'>
	</form>
			</div>
	
		<div class="item">
	<h1>Sign Up</h1>

	<!--Sign Up Form-->
	<form action="insert_user.php" method="post">
		Username : <input type ="text" name="username" required> <br>
		Password : <input type ="password" name="password" required> <br>
		<input type ="submit" value ="Insert">
	</form>
		</div>
		</div>
	</body>
