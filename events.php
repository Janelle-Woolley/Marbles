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
			// debug code
			echo "Logged In: ".$_SESSION['username'];
		?>
		<!-- creates grid -->
		<div class="grid-container">
			<!-- logo class from style sheet -->
			<div class="grid-item logo">
				logo
			</div>
			
			<!-- banner class from style sheet -->
			<div class="grid-item banner">
				banner
			</div>
			
			<!-- search_bar class from style sheet -->
			<div class="grid-item search_bar">
				search
			</div>
			
			<!-- nav_bar class from style sheet -->
			<div class="grid-item nav_bar">
				<nav>
					<!-- Creates links to each page with names -->
					<a href="home.php"> HOME </a>
					<a href="teams.php"> TEAMS </a>
					<a href="events.php"> EVENT </a>
					<a href="login.php"> LOGIN </a>
            	</nav>
			</div>
			
			<!-- anchor_bar class from style sheet -->
			<div class="grid-item anchor_bar">
				<?php
				/* gets the event number from the Events Form  */
				if(isset($_GET['event'])){
					$id = $_GET['event'];
				}else{
					/* otherwise is sets the event number to 1 */
					$id = 1;
				}
				?>
								
				<!-- Events Form -->
        		<form name="events_form" id="events_form" method="get" action="events.php">
            			<input id="event" type="submit" name="event" value="1">
						<input id="event" type="submit" name="event" value="2">
						<input id="event" type="submit" name="event" value="3">
						<input id="event" type="submit" name="event" value="4">
						<input id="event" type="submit" name="event" value="5">
						<input id="event" type="submit" name="event" value="6">
						<input id="event" type="submit" name="event" value="7">
						<input id="event" type="submit" name="event" value="8">
						<input id="event" type="submit" name="event" value="9">
						<input id="event" type="submit" name="event" value="10">
						<input id="event" type="submit" name="event" value="11">
						<input id="event" type="submit" name="event" value="12">
						<input id="event" type="submit" name="event" value="13">
						<input id="event" type="submit" name="event" value="14">
						<input id="event" type="submit" name="event" value="15">
						<input id="event" type="submit" name="event" value="16">
        		</form>
			</div>
			
			<!-- content class from style sheet -->
			<div class="grid-item content">
				<?php
				
				/* Query to select the placement, team name, and points for places 1-4 */
				$event_column_one_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 1 AND 4"; // Learnt about BETWEEN from:
// https://www.simplilearn.com/tutorials/sql-tutorial/sql-between#:~:text=The%20SQL%20Between%20operator%20is,%2C%20UPDATE%2C%20and%20DELETE%20command.
				
				/* Runs the query above */
				$event_column_one_result = mysqli_query($conn, $event_column_one_query);
				
				/* Query to select the placement, team name, and points for places 5-8 */
				$event_column_two_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 5 AND 8";
				/* Runs the query above */
				$event_column_two_result = mysqli_query($conn, $event_column_two_query);
				
				/* Query to select the placement, team name, and points for places 9-12 */
				$event_column_three_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 9 AND 12";
				/* Runs the query above */
				$event_column_three_result = mysqli_query($conn, $event_column_three_query);
				
				/* Query to select the placement, team name, and points for places 13-16 */
				$event_column_four_query = "SELECT events.placement, teams.team_name, events.points 
										FROM teams, events 
										WHERE teams.team_id = events.team_id 
										AND events.event_number = '" . $id ."'
										AND events.placement BETWEEN 13 AND 16";
				/* Runs the query above */
				$event_column_four_result = mysqli_query($conn, $event_column_four_query);

				/* Prints out the event number */
				echo "Event ".$id."<br>";


				?>
				
				<!-- event-content class from style sheet -->
				<div class="event-content">
					<!-- event-column class from style sheet -->
					<div class="event-column">
						<?php
						/* Query to select the sport */
						$sport_query = "SELECT DISTINCT sport FROM events WHERE event_number = '". $id ."'";
						/* Runs the query above */
						$sport_result = mysqli_query($conn, $sport_query);
						/* Stores the query results as an array */
						$sport_record = mysqli_fetch_assoc($sport_result);
						/* Prints out the sport */
						echo $sport_record['sport'];
						?>
					</div>
					
					<!-- event-column class from style sheet -->
					<div class="event-column">
						<?php
						/* Loops through the query results and prints the placement, team and points for places 1-4 */
						while($event_column_one_record = mysqli_fetch_assoc($event_column_one_result)){
						echo $event_column_one_record['placement']." ".$event_column_one_record['team_name']." ".$event_column_one_record['points']."<br>";
						}
						?>
					</div>
					
					<!-- event-column class from style sheet -->
					<div class="event-column">
						<?php
						/* Loops through the query results and prints the placement, team and points for places 5-8 */
						while($event_column_two_record = mysqli_fetch_assoc($event_column_two_result)){
						echo $event_column_two_record['placement']." ".$event_column_two_record['team_name']." ".$event_column_two_record['points']."<br>";
						}
						?>
					</div>
					
					<!-- event-column class from style sheet -->
					<div class="event-column">
						<?php
						/* Loops through the query results and prints the placement, team and points for places 9-12 */
						while($event_column_three_record = mysqli_fetch_assoc($event_column_three_result)){
						echo $event_column_three_record['placement']." ".$event_column_three_record['team_name']." ".$event_column_three_record['points']."<br>";
						}
						?>
					</div>
					
					<!-- event-column class from style sheet -->
					<div class="event-column">
						<?php
						/* Loops through the query results and prints the placement, team and points for places 13-16 */
						while($event_column_four_record = mysqli_fetch_assoc($event_column_four_result)){
						echo $event_column_four_record['placement']." ".$event_column_four_record['team_name']." ".$event_column_four_record['points']."<br>";
						}
						?>
					</div>
				</div>
			</div>
			
			
			<!-- footer class from style sheet -->
			<div class="grid-item footer">
				footer
			</div>	
		</div>
