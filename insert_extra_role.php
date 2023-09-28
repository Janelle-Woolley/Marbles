<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> ADD EXTRA ROLE - Jelle's Marble Leauge </title>
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
				$competitor_id = $_POST['extra_role_marble'];
				$roles_id = $_POST['extra_role'];

				// query to get the marble's current competitor_id and role_id
				$already_exist_query = "SELECT competitor_id, roles_id FROM competitors_roles WHERE competitor_id = ".$competitor_id." AND roles_id = ".$roles_id;
				$already_exist_results = mysqli_query($conn, $already_exist_query);
				$already_exist_count = mysqli_num_rows($already_exist_results);
				$does_not_exists = 0 ; // the length the of the result of the query if the competitor_id and roles_id combo already exists

				// if the competitor_id and roles_id combo does not exist
				if($already_exist_count == $does_not_exists){
					// query to insert the role info into the database submited from the admin page
					$insert_competitors_roles = "INSERT INTO competitors_roles (competitor_id, roles_id) VALUES ('$competitor_id', '$roles_id')";
					// if the query doesn't work
					if(!mysqli_query($conn, $insert_competitors_roles)){
						echo 'Unable to add Extra Role';
						header("refresh:5; url = admin.php");
					// if the query does work
					} else {
						echo 'Extra Role Added';
						header("refresh:2; url = admin.php");
					}
				// if the competitor_id and roles_id combo does exist
				} else {
					echo "The Marble Already Has That Role";
					header("refresh:5; url = admin.php");
				}
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
