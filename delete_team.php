<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> DELETE TEAM - Jelle's Marble Leauge </title>
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
			<!-- logo -->
			<div class="grid-item logo">
				<img src="images/logo.png" alt="Jelle's Marble Run's Logo" width="200" height="105">
			</div>
			
			<!-- banner -->
			<div class="grid-item banner">
				Jelle's Marble Race
			</div>
			
			<!-- search bar -->
			<div class="grid-item search_bar">
				<form method="post" action="search.php">
                	<input type="text" name="search">
                	<input type="submit" name="submit" value="Search" class="admin_button">
         		</form>
			</div>

			<!-- nav bar login section -->
			<div class="grid-item login_bar">
				<nav>
					<?php
						// displays login button if logged out 
						if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] != 1){
							echo "<a href='login.php'> LOGIN </a>";
						}
						// displays username and logout button if logged in
						else {
							echo "Logged In: ".$_SESSION['username'];
							echo "<a href='process_logout.php'> LOGOUT </a>";
						}
					?>
				</nav>
			</div>
			
			<!-- nav bar nav section -->
			<div class="grid-item nav_bar">
				<nav>
					<!-- Creates links to each page with names -->
					<a href="home.php"> HOME </a>
					<a href="teams.php"> TEAMS </a>
					<a href="events.php"> EVENT </a>
				</nav>
			</div>
	
			<!-- nav bar admin button section -->
			<div class="grid-item admin_bar">
				<nav>
					<?php
						if(isset($_SESSION['logged_in'])){
							$username = $_SESSION['username'];
							// query to get user rank
							$user_rank_query = "SELECT * FROM users WHERE username = '$username'";
							$user_rank_result = mysqli_query($conn, $user_rank_query);
							$user_rank_record = mysqli_fetch_assoc($user_rank_result);

							// displays the admin button if the user is an admin or owner
							if($user_rank_record['rank'] == "admin" || $user_rank_record['rank'] == "owner"){
								echo "<a href='admin.php'> ADMIN </a>";
							}
							// displays the owner button if the user is an owner
							if($user_rank_record['rank'] == "owner"){
								echo "<a href='owner.php'> OWNER </a>";
							}
						}
					?>
				</nav>
			</div>
		</div>

		<!-- content -->
		<div class="content">
			<!-- opens php -->
			<?php
				// query to delete team from database
				$delete_team = "DELETE FROM teams WHERE team_id='$_GET[team_id]'";

				// if query doesn't work
				if(!mysqli_query($conn, $delete_team)){
					echo 'Not Deleted';
				// if query does work
				} else {
					echo 'Deleted';
				}
				header("refresh:2; url = admin.php");
			?>
		</div>
		<!-- footer, creates grid -->
		<div class="footer_grid">
			<div class="footer">
				&copy; Jelle's Marble Race (Janelle Woolley)
			</div>
		</div>
	</body>
</html>
