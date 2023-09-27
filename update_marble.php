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

		?>
		<!-- creates grid -->
		<div class="grid-container">
			<!-- logo class from style sheet -->
			<div class="grid-item logo">
				 <img src="images/logo.png" alt="Jelle's Marble Run's Logo" width="200" height="105">
			</div>
			
			<!-- banner class from style sheet -->
			<div class="grid-item banner">
				Jelle's Marble Race
			</div>
			
			<!-- search_bar class from style sheet -->
			<div class="grid-item search_bar">
				<form method="post" action="search.php">
                	<input type="text" name="search">
                	<input type="submit" name="submit" value="Search" class="admin_button">
         		</form>
			</div>
			
			<!-- nav_bar class from style sheet -->
					<div class="grid-item login_bar">
					<nav>
					<?php
					// debug code
					if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] != 1){
						echo "<a href='login.php'> LOGIN </a>";
					}
					else {
						echo "Logged In: ".$_SESSION['username'];
						echo "<a href='process_logout.php'> LOGOUT </a>";
					}
					?>
					</nav>
					</div>
					<div class="grid-item nav_bar">
					<nav>
					<!-- Creates links to each page with names -->
					<a href="home.php"> HOME </a>
					<a href="teams.php"> TEAMS </a>
					<a href="events.php"> EVENT </a>
					</nav>
					</div>
					<div class="grid-item admin_bar">
					<nav>
						<?php
						if(isset($_SESSION['logged_in'])){
						$username = $_SESSION['username'];
						$user_rank_query = "SELECT * FROM users WHERE username = '$username'";
						$user_rank_result = mysqli_query($conn, $user_rank_query);
						$user_rank_record = mysqli_fetch_assoc($user_rank_result);

						if($user_rank_record['rank'] == "admin" || $user_rank_record['rank'] == "owner"){
							echo "<a href='admin.php'> ADMIN </a>";
						}
						if($user_rank_record['rank'] == "owner"){
							echo "<a href='owner.php'> OWNER </a>";
						}
						}
						?>
					</nav>
					</div>
		</div>
		<div class="content">
    <!-- opens php -->
    <?php
		$update_competitors = "UPDATE competitors SET competitor_name='$_POST[marble_name]', team_id='$_POST[marble_team]' WHERE competitor_id='$_POST[competitor_id]'";
		if(!mysqli_query($conn, $update_competitors))
		{
			echo 'Not Updated';
			header("refresh:2; url = admin.php");
		}
		
		$update_competitors_roles = "UPDATE competitors_roles SET roles_id='$_POST[marble_role]' WHERE competitor_id='$_POST[competitor_id]' AND roles_id='$_POST[current_role]'";
		if(!mysqli_query($conn, $update_competitors_roles))
		{
			echo 'Not Updated';
			// reset the competitor back
			$reset_competitors = "UPDATE competitors SET competitor_name='$_POST[current_name]', team_id='$_POST[current_team]' WHERE competitor_id='$_POST[competitor_id]'";
			header("refresh:2; url = admin.php");
		} else {
			echo 'Updated';
			header("refresh:2; url = admin.php");
		}
		
	?>
		</div>
	<div class="footer_grid">
			<!-- footer class from style sheet -->
			<div class="footer">
				&copy; Jelle's Marble Race (Janelle Woolley)
			</div>
		</div>
	</body>
