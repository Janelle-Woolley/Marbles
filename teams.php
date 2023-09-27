<!DOCTYPE html>

<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> TEAMS - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
		<!-- opens php -->
    	<?php
			session_start();
			include '../marbles_mysqli.php';
			
			// function to print marbles based on their role
			function print_roles($database_record, $role){
				if($database_record['role'] == $role){	
						echo $database_record['role'].": ".$database_record['competitor_name'];
						echo "<br>";
					}
			}

			// function to print team info
			function displayTeamInfo($conn){
				// query to get all the teams from the database
				$team_query = "SELECT * FROM teams ORDER BY team_code ASC";
				$team_results = mysqli_query($conn, $team_query);
				// loops through the query
				while($team_record = mysqli_fetch_assoc($team_results)){
					// creates the box for the content
					echo "<div id=".$team_record['team_id']." class='team-info'>";
					echo "<div class='team-info-column'>";
					// prints the team code, name, hashtag and image
					echo $team_record['team_code']." - ".$team_record['team_name'];
					echo "<br>";
					echo "#".$team_record['hashtag'];
					echo "<img src='images/".$team_record['image']."' alt='".$team_record['team_name']." Logo' width=100 height=124>";
					echo "</div>";
					// query to get team members
					$team_members_query = "SELECT competitors.competitor_name, roles.role
										   FROM competitors, roles, teams, competitors_roles 
										   WHERE competitors.team_id = teams.team_id 
										   AND competitors.competitor_id = competitors_roles.competitor_id 
										   AND roles.roles_id = competitors_roles.roles_id
										   AND teams.team_id = ".$team_record['team_id'];
					$team_members_result = mysqli_query($conn, $team_members_query);
					echo "<div class='team-info-column'>";
					// loops through the team members and runs the print_roles function for the Captain and Athletes
					while($team_members_record = mysqli_fetch_assoc($team_members_result)){
						print_roles($team_members_record, "Captain");
						print_roles($team_members_record, "Athlete");
					}
					echo "</div>";
					echo "<div class='team-info-column'>";
					mysqli_data_seek($team_members_result, 0); // Reset the result pointer
					// loops through the team members and runs the print_roles function for the Reserve, Coach, Manager and Retired
					while($team_members_record = mysqli_fetch_assoc($team_members_result)){
						print_roles($team_members_record, "Reserve");
						print_roles($team_members_record, "Coach");
						print_roles($team_members_record, "Manager");
						print_roles($team_members_record, "Retired");
					}
					echo "</div>";
					echo "</div>";
				}

			}
		
			// function to create the anchor buttons
			function displayButtons($conn){
				// query to get the team code and id
				$team_query = "SELECT team_code, team_id FROM teams ORDER BY team_code ASC";
				$team_results = mysqli_query($conn, $team_query);
				// loops through query create anchour buttons
				while($team_record = mysqli_fetch_assoc($team_results)){
					echo "<a href='#".$team_record['team_id']."'> ".$team_record['team_code']." </a>";
				}
			}
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
			
			<!-- anchor bar -->
			<div class="grid-item anchor_bar">
				<nav>
					<?php
					// runs function to display anchor buttons
					displayButtons($conn)
					?>
				</nav>
			</div>
			</div>
			<!-- content  -->
			<div class="content">
				<div class="team-content">
					<?php
					// run function to display team info boxes
					displayTeamInfo($conn);
		  			?>
				</div>		
			</div>
			<!-- footer, creates grid -->
			<div class="footer_grid">
			<div class="footer">
				&copy; Jelle's Marble Race (Janelle Woolley)
			</div>
		</div>
	</body>
