<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> ADD MARBLE - Jelle's Marble Leauge </title>
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
				$competitor_name = $_POST['marble_name'];
				$team_id = $_POST['marble_team'];
				$role_id = $_POST['marble_role'];

				// query to insert the marble info into the database submited from the admin page
				$insert_competitors = "INSERT INTO competitors (competitor_name, team_id) VALUES ('$competitor_name', '$team_id')";

				// if the query doesn't work
				if(!mysqli_query($conn, $insert_competitors)){
					echo 'Unable to add Marble';
					header("refresh:2; url = admin.php");
				}

				// query to select the competitor_id of the marble just added to the database
				$competitor_id_query = "SELECT competitor_id FROM competitors WHERE competitor_name = '$competitor_name'";
				$competitor_id_result = mysqli_query($conn, $competitor_id_query);
				$competitor_id_record = mysqli_fetch_assoc($competitor_id_result);
				$competitor_id = $competitor_id_record['competitor_id'];

				// query to insert the marble role info into the database submited from the admin page
				$insert_competitors_roles = "INSERT INTO competitors_roles (competitor_id, roles_id) VALUES ('$competitor_id', '$role_id')";

				// if the query doesn't work
				if(mysqli_query($conn, $insert_competitors_roles)){
					echo 'Unable to add Marble role';
					header("refresh:2; url = admin.php");
				// if the query does work
				} else {
					echo 'Marble Added';
					header("refresh:2; url = admin.php");
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
