<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> EVENTS - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
		<!-- opens php -->
    	<?php
			session_start();
			include '../marbles_mysqli.php';
				
			// gets the event number from the Events Form
			if(isset($_GET['event'])){
				$id = $_GET['event'];
			}else{
				// otherwise is sets the event number to 1
				$id = 1;	
			}
		
		// Query to select the placement, team name, and points for places 1-4
		$event_column_one_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 1 AND 4"; /* Learnt about BETWEEN from:
										https://www.simplilearn.com/tutorials/sql-tutorial/sql-between#:~:text=The%20SQL%20Between%20operator%20is,%2C%20UPDATE%2C%20and%20DELETE%20command.*/
				
				// Runs the query above
				$event_column_one_result = mysqli_query($conn, $event_column_one_query);
				
				// Query to select the placement, team name, and points for places 5-8
				$event_column_two_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 5 AND 8";
				// Runs the query above
				$event_column_two_result = mysqli_query($conn, $event_column_two_query);
				
				// Query to select the placement, team name, and points for places 9-12
				$event_column_three_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 9 AND 12";
				// Runs the query above
				$event_column_three_result = mysqli_query($conn, $event_column_three_query);
				
				// Query to select the placement, team name, and points for places 13-16
				$event_column_four_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 13 AND 16";
				// Runs the query above
				$event_column_four_result = mysqli_query($conn, $event_column_four_query);
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
				<?php
					$event_number_query = "SELECT DISTINCT event_number FROM events";
					$event_number_result = mysqli_query($conn, $event_number_query);
					echo "<form name='events_form' id='events_form' method='get' action='events.php'>";
					while ($event_number_record = mysqli_fetch_assoc($event_number_result)){
						echo "<input class='event_button' id='event".$event_number_record['event_number']."' type='submit' name='event' value='$event_number_record[event_number]'>";
					}
					echo "</form>";
				?>
			</div>
		</div>
		
		<!-- content -->
		<div class="content">
			<header>
				<?php
					// Prints out the event number
					echo "Event ".$id."<br>";
				?>
				</header>

				<div class="event-content">
					<!--  event column -->
					<div class="event-column">
						<?php
						// Query to select the sport
						$sport_query = "SELECT DISTINCT sport FROM events WHERE event_number = '". $id ."'";
						// Runs the query above
						$sport_result = mysqli_query($conn, $sport_query);
						// Stores the query results as an array
						$sport_record = mysqli_fetch_assoc($sport_result);
						// Prints out the sport
						echo $sport_record['sport'];
						?>
					</div>
					
					<!--  event column -->
					<div class="event-column">
						<?php
						// Loops through the query results and prints the placement, team and points for places 1-4
						while($event_column_one_record = mysqli_fetch_assoc($event_column_one_result)){
							echo $event_column_one_record['placement']." ".$event_column_one_record['team_name']." ".$event_column_one_record['points']."<br>";
						}
						?>
					</div>
					
					<!--  event column -->
					<div class="event-column">
						<?php
						// Loops through the query results and prints the placement, team and points for places 5-8
						while($event_column_two_record = mysqli_fetch_assoc($event_column_two_result)){
							echo $event_column_two_record['placement']." ".$event_column_two_record['team_name']." ".$event_column_two_record['points']."<br>";
						}
						?>
					</div>
					
					<!--  event column -->
					<div class="event-column">
						<?php
						// Loops through the query results and prints the placement, team and points for places 9-12
						while($event_column_three_record = mysqli_fetch_assoc($event_column_three_result)){
							echo $event_column_three_record['placement']." ".$event_column_three_record['team_name']." ".$event_column_three_record['points']."<br>";
						}
						?>
					</div>
					
					<!-- event-column class from style sheet -->
					<div class="event-column">
						<?php
						// Loops through the query results and prints the placement, team and points for places 13-16 
						while($event_column_four_record = mysqli_fetch_assoc($event_column_four_result)){
							echo $event_column_four_record['placement']." ".$event_column_four_record['team_name']." ".$event_column_four_record['points']."<br>";
						}
						?>
					</div>
				</div>
			</div>
			
			
			<div class="footer_grid">
			<!-- footer class from style sheet -->
			<div class="footer">
				&copy; Jelle's Marble Race (Janelle Woolley)
			</div>
		</div>	
	</body>
</html>
