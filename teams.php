<DOCTYPE html>

<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> TEAMS - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
		<!-- opens php -->
    	<?php
			session_start();
			include '../marbles_mysqli.php';
			// debug code
			
			function print_roles($database_record, $role){
				if($database_record['role'] == $role){	
						echo $database_record['role'].": ".$database_record['competitor_name'];
						echo "<br>";
					}
			}
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
                	<input type="submit" name="submit" value="Search" class="search_button">
         		</form>
			</div>
			
			<!-- nav_bar class from style sheet -->
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
			
			<!-- anchor_bar class from style sheet -->
			<div class="grid-item anchor_bar">
				<nav>
				<a href="#bumble-bees"> BEE </a>
				<a href="#balls-of-chaos"> BOC </a>
				<a href="#crazy-cats-eyes"> CCE </a>
				<a href="#chocolatiers"> CHO </a>
				<a href="#team-galactic"> GAL </a>
				<a href="#green-ducks"> GDK </a>
				<a href="#gliding-glaciers"> GLI </a>
				<a href="#midnight-wisps"> MNW </a>
				<a href="#minty-maniacs"> MNT </a>
				<a href="#mellow-yellow"> MYL </a>
				<a href="#orangers"> ORA </a>
				<a href="#pinkies"> PNK </a>
				<a href="#team-primary"> PRM </a>
				<a href="#raspberry-racers"> RSP </a>
				<a href="#savage-speeders"> SAV </a>
				<a href="#shining-swarm"> SHI </a>
				</nav>
			</div>
			</div>
			<!-- content class from style sheet -->
			<div class="grid-item content">
				<div class="team-content">
					<div id="bumble-bees" class="team-info">
					<div class="team-info-column">
						<?php
							$bumble_bees_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 12";
							$bumble_bees_result = mysqli_query($conn, $bumble_bees_query);
							$bumble_bees_record = mysqli_fetch_assoc($bumble_bees_result);
							echo $bumble_bees_record['team_code']." - ".$bumble_bees_record['team_name'];
							echo "<br>";
							echo "#".$bumble_bees_record['hashtag'];
							echo "<img src='images/".$bumble_bees_record['image']."' alt='".$bumble_bees_record['team_name']." Logo' width=100, height=124>";
						?>
					</div>
					<div class="team-info-column">
						<?php

						$bumble_bees_members_query = "SELECT competitors.competitor_name, roles.role, roles.description
													  FROM competitors, roles, teams, competitors_roles 
													  WHERE competitors.team_id = teams.team_id 
													  AND competitors.competitor_id = competitors_roles.competitor_id 
													  AND roles.roles_id = competitors_roles.roles_id
													  AND teams.team_id = 12";

						$bumble_bees_members_result = mysqli_query($conn, $bumble_bees_members_query);
						while ($bumble_bees_members_record_1 = mysqli_fetch_assoc($bumble_bees_members_result)){
							print_roles($bumble_bees_members_record_1, "Captain");
							print_roles($bumble_bees_members_record_1, "Athlete");
						}
						?>
					</div>
					<div class="team-info-column">
						<?php
							$bumble_bees_members_result_2 = mysqli_query($conn, $bumble_bees_members_query);
							while ($bumble_bees_members_record_2 = mysqli_fetch_assoc($bumble_bees_members_result_2)){
								print_roles($bumble_bees_members_record_2, "Reserve");
								print_roles($bumble_bees_members_record_2, "Coach");
								print_roles($bumble_bees_members_record_2, "Manager");
								print_roles($bumble_bees_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="balls-of-chaos" class="team-info">
						<div class="team-info-column">
						<?php
							$balls_of_chaos_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 14";
							$balls_of_chaos_result = mysqli_query($conn, $balls_of_chaos_query);
							$balls_of_chaos_record = mysqli_fetch_assoc($balls_of_chaos_result);
							echo $balls_of_chaos_record['team_code']." - ".$balls_of_chaos_record['team_name'];
							echo "<br>";
							echo "#".$balls_of_chaos_record['hashtag'];
							echo "<img src='images/".$balls_of_chaos_record['image']."' alt='".$balls_of_chaos_record['team_name']." Logo' width=100, height=124>";
							?>
						</div>
						<div class="team-info-column">
							<?php
								$balls_of_chaos_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
																FROM competitors, roles, teams, competitors_roles 
																WHERE competitors.team_id = teams.team_id 
																AND competitors.competitor_id = competitors_roles.competitor_id 
																AND roles.roles_id = competitors_roles.roles_id
																AND teams.team_id = 14";
							
								$balls_of_chaos_members_result = mysqli_query($conn, $balls_of_chaos_members_query);
								while ($balls_of_chaos_members_record_1 = mysqli_fetch_assoc($balls_of_chaos_members_result)){
									print_roles($balls_of_chaos_members_record_1, "Captain");
									print_roles($balls_of_chaos_members_record_1, "Athlete");
								}
							?>
							</div>
							<div class="team-info-column">
							<?php
								$balls_of_chaos_members_result_2 = mysqli_query($conn, $balls_of_chaos_members_query);
								while ($balls_of_chaos_members_record_2 = mysqli_fetch_assoc($balls_of_chaos_members_result_2)){
									print_roles($balls_of_chaos_members_record_2, "Reserve");
									print_roles($balls_of_chaos_members_record_2, "Coach");
									print_roles($balls_of_chaos_members_record_2, "Manager");
									print_roles($balls_of_chaos_members_record_2, "Retired");
								}
							?>
						</div>
					</div>
					<div id="crazy-cats-eyes" class="team-info">
						<div class="team-info-column">
						<?php
							$crazy_cats_eyes_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 13";
							$crazy_cats_eyes_result = mysqli_query($conn, $crazy_cats_eyes_query);
							$crazy_cats_eyes_record = mysqli_fetch_assoc($crazy_cats_eyes_result);
							echo $crazy_cats_eyes_record['team_code']." - ".$crazy_cats_eyes_record['team_name'];
							echo "<br>";
							echo "#".$crazy_cats_eyes_record['hashtag'];
							echo "<img src='images/".$crazy_cats_eyes_record['image']."' alt='".$crazy_cats_eyes_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php

							$crazy_cats_eyes_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 13";

							$crazy_cats_eyes_members_result = mysqli_query($conn, $crazy_cats_eyes_members_query);
							while ($crazy_cats_eyes_members_record_1 = mysqli_fetch_assoc($crazy_cats_eyes_members_result)){
								print_roles($crazy_cats_eyes_members_record_1, "Captain");
								print_roles($crazy_cats_eyes_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$crazy_cats_eyes_members_result_2 = mysqli_query($conn, $crazy_cats_eyes_members_query);
							while ($crazy_cats_eyes_members_record_2 = mysqli_fetch_assoc($crazy_cats_eyes_members_result_2)){
								print_roles($crazy_cats_eyes_members_record_2, "Reserve");
								print_roles($crazy_cats_eyes_members_record_2, "Coach");
								print_roles($crazy_cats_eyes_members_record_2, "Manager");
								print_roles($crazy_cats_eyes_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="chocolatiers" class="team-info">
						<div class="team-info-column">
						<?php
							$chocolatiers_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 5";
							$chocolatiers_result = mysqli_query($conn, $chocolatiers_query);
							$chocolatiers_record = mysqli_fetch_assoc($chocolatiers_result);
							echo $chocolatiers_record['team_code']." - ".$chocolatiers_record['team_name'];
							echo "<br>";
							echo "#".$chocolatiers_record['hashtag'];
							echo "<img src='images/".$chocolatiers_record['image']."' alt='".$chocolatiers_record['team_name']." Logo' width=100, height=124>";
							?>
						</div>
						<div class="team-info-column">
						<?php
							$chocolatiers_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 5";

							$chocolatiers_members_result = mysqli_query($conn, $chocolatiers_members_query);
							while ($chocolatiers_members_record_1 = mysqli_fetch_assoc($chocolatiers_members_result)){
								print_roles($chocolatiers_members_record_1, "Captain");
								print_roles($chocolatiers_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$chocolatiers_members_result_2 = mysqli_query($conn, $chocolatiers_members_query);
							while ($chocolatiers_members_record_2 = mysqli_fetch_assoc($chocolatiers_members_result_2)){
								print_roles($chocolatiers_members_record_2, "Reserve");
								print_roles($chocolatiers_members_record_2, "Coach");
								print_roles($chocolatiers_members_record_2, "Manager");
								print_roles($chocolatiers_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="team-galactic" class="team-info">
						<div class="team-info-column">
						<?php
							$team_galactic_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 15";
							$team_galactic_result = mysqli_query($conn, $team_galactic_query);
							$team_galactic_record = mysqli_fetch_assoc($team_galactic_result);
							echo $team_galactic_record['team_code']." - ".$team_galactic_record['team_name'];
							echo "<br>";
							echo "#".$team_galactic_record['hashtag'];
							echo "<img src='images/".$team_galactic_record['image']."' alt='".$team_galactic_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$team_galactic_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 15";

							$team_galactic_members_result = mysqli_query($conn, $team_galactic_members_query);
							while ($team_galactic_members_record_1 = mysqli_fetch_assoc($team_galactic_members_result)){
								print_roles($team_galactic_members_record_1, "Captain");
								print_roles($team_galactic_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$team_galactic_members_result_2 = mysqli_query($conn, $team_galactic_members_query);
							while ($team_galactic_members_record_2 = mysqli_fetch_assoc($team_galactic_members_result_2)){
								print_roles($team_galactic_members_record_2, "Reserve");
								print_roles($team_galactic_members_record_2, "Coach");
								print_roles($team_galactic_members_record_2, "Manager");
								print_roles($team_galactic_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="green-ducks" class="team-info">
					<div class="team-info-column">
						<?php
							$green_ducks_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 1";
							$green_ducks_result = mysqli_query($conn, $green_ducks_query);
							$green_ducks_record = mysqli_fetch_assoc($green_ducks_result);
							echo $green_ducks_record['team_code']." - ".$green_ducks_record['team_name'];
							echo "<br>";
							echo "#".$green_ducks_record['hashtag'];
							echo "<img src='images/".$green_ducks_record['image']."' alt='".$green_ducks_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$green_ducks_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 1";

							$green_ducks_members_result = mysqli_query($conn, $green_ducks_members_query);
							while ($green_ducks_members_record_1 = mysqli_fetch_assoc($green_ducks_members_result)){
								print_roles($green_ducks_members_record_1, "Captain");
								print_roles($green_ducks_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$green_ducks_members_result_2 = mysqli_query($conn, $green_ducks_members_query);
							while ($green_ducks_members_record_2 = mysqli_fetch_assoc($green_ducks_members_result_2)){
								print_roles($green_ducks_members_record_2, "Reserve");
								print_roles($green_ducks_members_record_2, "Coach");
								print_roles($green_ducks_members_record_2, "Manager");
								print_roles($green_ducks_members_record_2, "Retired");
							}
							?>
					</div>
					</div>
					<div id="gliding-glaciers" class="team-info">
					<div class="team-info-column">
						<?php
							$gliding_glaciers_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 4";
							$gliding_glaciers_result = mysqli_query($conn, $gliding_glaciers_query);
							$gliding_glaciers_record = mysqli_fetch_assoc($gliding_glaciers_result);
							echo $gliding_glaciers_record['team_code']." - ".$gliding_glaciers_record['team_name'];
							echo "<br>";
							echo "#".$gliding_glaciers_record['hashtag'];
							echo "<img src='images/".$gliding_glaciers_record['image']."' alt='".$gliding_glaciers_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$gliding_glaciers_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 4";

							$gliding_glaciers_members_result = mysqli_query($conn, $gliding_glaciers_members_query);
							while ($gliding_glaciers_members_record_1 = mysqli_fetch_assoc($gliding_glaciers_members_result)){
								print_roles($gliding_glaciers_members_record_1, "Captain");
								print_roles($gliding_glaciers_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$gliding_glaciers_members_result_2 = mysqli_query($conn, $gliding_glaciers_members_query);
							while ($gliding_glaciers_members_record_2 = mysqli_fetch_assoc($gliding_glaciers_members_result_2)){
								print_roles($gliding_glaciers_members_record_2, "Reserve");
								print_roles($gliding_glaciers_members_record_2, "Coach");
								print_roles($gliding_glaciers_members_record_2, "Manager");
								print_roles($gliding_glaciers_members_record_2, "Retired");
							}
							?>
					</div>
					</div>
					<div id="midnight-wisps" class="team-info">
					<div class="team-info-column">
						<?php
							$midnight_wisps_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 7";
							$midnight_wisps_result = mysqli_query($conn, $midnight_wisps_query);
							$midnight_wisps_record = mysqli_fetch_assoc($midnight_wisps_result);
							echo $midnight_wisps_record['team_code']." - ".$midnight_wisps_record['team_name'];
							echo "<br>";
							echo "#".$midnight_wisps_record['hashtag'];
							echo "<img src='images/".$midnight_wisps_record['image']."' alt='".$midnight_wisps_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$midnight_wisps_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 7";

							$midnight_wisps_members_result = mysqli_query($conn, $midnight_wisps_members_query);
							while ($midnight_wisps_members_record_1 = mysqli_fetch_assoc($midnight_wisps_members_result)){
								print_roles($midnight_wisps_members_record_1, "Captain");
								print_roles($midnight_wisps_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$midnight_wisps_members_result_2 = mysqli_query($conn, $midnight_wisps_members_query);
							while ($midnight_wisps_members_record_2 = mysqli_fetch_assoc($midnight_wisps_members_result_2)){
								print_roles($midnight_wisps_members_record_2, "Reserve");
								print_roles($midnight_wisps_members_record_2, "Coach");
								print_roles($midnight_wisps_members_record_2, "Manager");
								print_roles($midnight_wisps_members_record_2, "Retired");
							}
							?>
					</div>
					</div>
					<div id="minty-maniacs" class="team-info">
					<div class="team-info-column">
						<?php
							$minty_maniacs_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 16";
							$minty_maniacs_result = mysqli_query($conn, $minty_maniacs_query);
							$minty_maniacs_record = mysqli_fetch_assoc($minty_maniacs_result);
							echo $minty_maniacs_record['team_code']." - ".$minty_maniacs_record['team_name'];
							echo "<br>";
							echo "#".$minty_maniacs_record['hashtag'];
							echo "<img src='images/".$minty_maniacs_record['image']."' alt='".$minty_maniacs_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$minty_maniacs_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 16";

							$minty_maniacs_members_result = mysqli_query($conn, $minty_maniacs_members_query);
							while ($minty_maniacs_members_record_1 = mysqli_fetch_assoc($minty_maniacs_members_result)){
								print_roles($minty_maniacs_members_record_1, "Captain");
								print_roles($minty_maniacs_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$minty_maniacs_members_result_2 = mysqli_query($conn, $minty_maniacs_members_query);
							while ($minty_maniacs_members_record_2 = mysqli_fetch_assoc($minty_maniacs_members_result_2)){
								print_roles($minty_maniacs_members_record_2, "Reserve");
								print_roles($minty_maniacs_members_record_2, "Coach");
								print_roles($minty_maniacs_members_record_2, "Manager");
								print_roles($minty_maniacs_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="mellow-yellow" class="team-info">
					<div class="team-info-column">
						<?php
							$mellow_yellow_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 2";
							$mellow_yellow_result = mysqli_query($conn, $mellow_yellow_query);
							$mellow_yellow_record = mysqli_fetch_assoc($mellow_yellow_result);
							echo $mellow_yellow_record['team_code']." - ".$mellow_yellow_record['team_name'];
							echo "<br>";
							echo "#".$mellow_yellow_record['hashtag'];
							echo "<img src='images/".$mellow_yellow_record['image']."' alt='".$mellow_yellow_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$mellow_yellow_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
															FROM competitors, roles, teams, competitors_roles 
															WHERE competitors.team_id = teams.team_id 
															AND competitors.competitor_id = competitors_roles.competitor_id 
															AND roles.roles_id = competitors_roles.roles_id
															AND teams.team_id = 2";

							$mellow_yellow_members_result = mysqli_query($conn, $mellow_yellow_members_query);
							while ($mellow_yellow_members_record_1 = mysqli_fetch_assoc($mellow_yellow_members_result)){
								print_roles($mellow_yellow_members_record_1, "Captain");
								print_roles($mellow_yellow_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$mellow_yellow_members_result_2 = mysqli_query($conn, $mellow_yellow_members_query);
							while ($mellow_yellow_members_record_2 = mysqli_fetch_assoc($mellow_yellow_members_result_2)){
								print_roles($mellow_yellow_members_record_2, "Reserve");
								print_roles($mellow_yellow_members_record_2, "Coach");
								print_roles($mellow_yellow_members_record_2, "Manager");
								print_roles($mellow_yellow_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="orangers" class="team-info">
					<div class="team-info-column">
						<?php
							$orangers_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 10";
							$orangers_result = mysqli_query($conn, $orangers_query);
							$orangers_record = mysqli_fetch_assoc($orangers_result);
							echo $orangers_record['team_code']." - ".$orangers_record['team_name'];
							echo "<br>";
							echo "#".$orangers_record['hashtag'];
							echo "<img src='images/".$orangers_record['image']."' alt='".$orangers_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$orangers_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
														FROM competitors, roles, teams, competitors_roles 
														WHERE competitors.team_id = teams.team_id 
														AND competitors.competitor_id = competitors_roles.competitor_id 
														AND roles.roles_id = competitors_roles.roles_id
														AND teams.team_id = 10";

							$orangers_members_result = mysqli_query($conn, $orangers_members_query);
							while ($orangers_members_record_1 = mysqli_fetch_assoc($orangers_members_result)){
								print_roles($orangers_members_record_1, "Captain");
								print_roles($orangers_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$orangers_members_result_2 = mysqli_query($conn, $orangers_members_query);
							while ($orangers_members_record_2 = mysqli_fetch_assoc($orangers_members_result_2)){
								print_roles($orangers_members_record_2, "Reserve");
								print_roles($orangers_members_record_2, "Coach");
								print_roles($orangers_members_record_2, "Manager");
								print_roles($orangers_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="pinkies" class="team-info">
					<div class="team-info-column">
						<?php
							$pinkies_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 8";
							$pinkies_result = mysqli_query($conn, $pinkies_query);
							$pinkies_record = mysqli_fetch_assoc($pinkies_result);
							echo $pinkies_record['team_code']." - ".$pinkies_record['team_name'];
							echo "<br>";
							echo "#".$pinkies_record['hashtag'];
							echo "<img src='images/".$pinkies_record['image']."' alt='".$pinkies_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$pinkies_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
														FROM competitors, roles, teams, competitors_roles 
														WHERE competitors.team_id = teams.team_id 
														AND competitors.competitor_id = competitors_roles.competitor_id 
														AND roles.roles_id = competitors_roles.roles_id
														AND teams.team_id = 8";

							$pinkies_members_result = mysqli_query($conn, $pinkies_members_query);
							while ($pinkies_members_record_1 = mysqli_fetch_assoc($pinkies_members_result)){
								print_roles($pinkies_members_record_1, "Captain");
								print_roles($pinkies_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$pinkies_members_result_2 = mysqli_query($conn, $pinkies_members_query);
							while ($pinkies_members_record_2 = mysqli_fetch_assoc($pinkies_members_result_2)){
								print_roles($pinkies_members_record_2, "Reserve");
								print_roles($pinkies_members_record_2, "Coach");
								print_roles($pinkies_members_record_2, "Manager");
								print_roles($pinkies_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="team-primary" class="team-info">
					<div class="team-info-column">
						<?php
							$team_primary_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 6";
							$team_primary_result = mysqli_query($conn, $team_primary_query);
							$team_primary_record = mysqli_fetch_assoc($team_primary_result);
							echo $team_primary_record['team_code']." - ".$team_primary_record['team_name'];
							echo "<br>";
							echo "#".$team_primary_record['hashtag'];
							echo "<img src='images/".$team_primary_record['image']."' alt='".$team_primary_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$team_primary_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
														FROM competitors, roles, teams, competitors_roles 
														WHERE competitors.team_id = teams.team_id 
														AND competitors.competitor_id = competitors_roles.competitor_id 
														AND roles.roles_id = competitors_roles.roles_id
														AND teams.team_id = 6";

							$team_primary_members_result = mysqli_query($conn, $team_primary_members_query);
							while ($team_primary_members_record_1 = mysqli_fetch_assoc($team_primary_members_result)){
								print_roles($team_primary_members_record_1, "Captain");
								print_roles($team_primary_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$team_primary_members_result_2 = mysqli_query($conn, $team_primary_members_query);
							while ($team_primary_members_record_2 = mysqli_fetch_assoc($team_primary_members_result_2)){
								print_roles($team_primary_members_record_2, "Reserve");
								print_roles($team_primary_members_record_2, "Coach");
								print_roles($team_primary_members_record_2, "Manager");
								print_roles($team_primary_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="raspberry-racers" class="team-info">
					<div class="team-info-column">
						<?php
							$raspberry_racers_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 3";
							$raspberry_racers_result = mysqli_query($conn, $raspberry_racers_query);
							$raspberry_racers_record = mysqli_fetch_assoc($raspberry_racers_result);
							echo $raspberry_racers_record['team_code']." - ".$raspberry_racers_record['team_name'];
							echo "<br>";
							echo "#".$raspberry_racers_record['hashtag'];
							echo "<img src='images/".$raspberry_racers_record['image']."' alt='".$raspberry_racers_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$raspberry_racers_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
														FROM competitors, roles, teams, competitors_roles 
														WHERE competitors.team_id = teams.team_id 
														AND competitors.competitor_id = competitors_roles.competitor_id 
														AND roles.roles_id = competitors_roles.roles_id
														AND teams.team_id = 3";

							$raspberry_racers_members_result = mysqli_query($conn, $raspberry_racers_members_query);
							while ($raspberry_racers_members_record_1 = mysqli_fetch_assoc($raspberry_racers_members_result)){
								print_roles($raspberry_racers_members_record_1, "Captain");
								print_roles($raspberry_racers_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$raspberry_racers_members_result_2 = mysqli_query($conn, $raspberry_racers_members_query);
							while ($raspberry_racers_members_record_2 = mysqli_fetch_assoc($raspberry_racers_members_result_2)){
								print_roles($raspberry_racers_members_record_2, "Reserve");
								print_roles($raspberry_racers_members_record_2, "Coach");
								print_roles($raspberry_racers_members_record_2, "Manager");
								print_roles($raspberry_racers_members_record_2, "Retired");
							}
						?>
					</div>
					</div>
					<div id="savage-speeders" class="team-info">
					<div class="team-info-column">
						<?php
							$savage_speeders_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 11";
							$savage_speeders_result = mysqli_query($conn, $savage_speeders_query);
							$savage_speeders_record = mysqli_fetch_assoc($savage_speeders_result);
							echo $savage_speeders_record['team_code']." - ".$savage_speeders_record['team_name'];
							echo "<br>";
							echo "#".$savage_speeders_record['hashtag'];
							echo "<img src='images/".$savage_speeders_record['image']."' alt='".$savage_speeders_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$savage_speeders_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
														FROM competitors, roles, teams, competitors_roles 
														WHERE competitors.team_id = teams.team_id 
														AND competitors.competitor_id = competitors_roles.competitor_id 
														AND roles.roles_id = competitors_roles.roles_id
														AND teams.team_id = 11";

							$savage_speeders_members_result = mysqli_query($conn, $savage_speeders_members_query);
							while ($savage_speeders_members_record_1 = mysqli_fetch_assoc($savage_speeders_members_result)){
								print_roles($savage_speeders_members_record_1, "Captain");
								print_roles($savage_speeders_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$savage_speeders_members_result_2 = mysqli_query($conn, $savage_speeders_members_query);
							while ($savage_speeders_members_record_2 = mysqli_fetch_assoc($savage_speeders_members_result_2)){
								print_roles($savage_speeders_members_record_2, "Reserve");
								print_roles($savage_speeders_members_record_2, "Coach");
								print_roles($savage_speeders_members_record_2, "Manager");
								print_roles($savage_speeders_members_record_2, "Retired");
							}
						?>
					</div>
					</div>	
					<div id="shining-swarm" class="team-info">
					<div class="team-info-column">
						<?php
							$shining_swarm_query = "SELECT team_code, team_name, hashtag, image FROM teams WHERE team_id = 9";
							$shining_swarm_result = mysqli_query($conn, $shining_swarm_query);
							$shining_swarm_record = mysqli_fetch_assoc($shining_swarm_result);
							echo $shining_swarm_record['team_code']." - ".$shining_swarm_record['team_name'];
							echo "<br>";
							echo "#".$shining_swarm_record['hashtag'];
							echo "<img src='images/".$shining_swarm_record['image']."' alt='".$shining_swarm_record['team_name']." Logo' width=100, height=124>";
						?>
						</div>
						<div class="team-info-column">
						<?php
							$shining_swarm_members_query = "SELECT competitors.competitor_name, roles.role, roles.description 
														FROM competitors, roles, teams, competitors_roles 
														WHERE competitors.team_id = teams.team_id 
														AND competitors.competitor_id = competitors_roles.competitor_id 
														AND roles.roles_id = competitors_roles.roles_id
														AND teams.team_id = 9";

							$shining_swarm_members_result = mysqli_query($conn, $shining_swarm_members_query);
							while ($shining_swarm_members_record_1 = mysqli_fetch_assoc($shining_swarm_members_result)){
								print_roles($shining_swarm_members_record_1, "Captain");
								print_roles($shining_swarm_members_record_1, "Athlete");
							}
						?>
						</div>
						<div class="team-info-column">
						<?php
							$shining_swarm_members_result_2 = mysqli_query($conn, $shining_swarm_members_query);
							while ($shining_swarm_members_record_2 = mysqli_fetch_assoc($shining_swarm_members_result_2)){
								print_roles($shining_swarm_members_record_2, "Reserve");
								print_roles($shining_swarm_members_record_2, "Coach");
								print_roles($shining_swarm_members_record_2, "Manager");
								print_roles($shining_swarm_members_record_2, "Retired");
							}
						?>
					</div>		
			</div>		
			</div>
			<div class="footer_grid">
			<!-- footer class from style sheet -->
			<div class="footer">
				footer
			</div>
		</div>
		</div>
	</body>
