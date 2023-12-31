<!DOCTYPE html>

<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> SEARCH - Jelle's Marble Runs </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
		<!-- opens php -->
		<?php
			session_start();
			include '../marbles_mysqli.php';

			// searches database to see if the input matches
			if(isset($_POST['search'])){
				$search = $_POST['search'];
			}

			// query to select marbles with names that contain the searched input
			$search_query_competitors = "SELECT competitor_name
										FROM competitors
										WHERE competitor_name LIKE '%$search%'";

			// query to select teams with name that contain the searched input
			$search_query_teams = "SELECT team_name
								  FROM teams
								  WHERE team_name LIKE '%$search%'";

			// query to select events with sports that contain the searched input
			$search_query_events = "SELECT DISTINCT event_number, sport
								   FROM events
								   WHERE sport LIKE '%$search%'";
		?>
		
		<!-- creates grid -->
		<div class="grid-container">
			<!-- logo -->
			<div class="grid-item logo">
				<img src="images/logo.png" alt="Jelle's Marble Run's Logo" width="200" height="105">
			</div>
			
			<!-- banner -->
			<div class="grid-item banner">
				Jelle's Marble Runs
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
		
		<!-- content  -->
		<div class="content">
			<?php
				$search_query_competitors_results = mysqli_query($conn, $search_query_competitors);
				$search_query_teams_results = mysqli_query($conn, $search_query_teams);
				$search_query_events_results = mysqli_query($conn, $search_query_events);
                $count = mysqli_num_rows($search_query_competitors_results)+mysqli_num_rows($search_query_teams_results)+mysqli_num_rows($search_query_events_results);
				$competitors_count = mysqli_num_rows($search_query_competitors_results);
				$teams_count = mysqli_num_rows($search_query_teams_results);
				$events_count = mysqli_num_rows($search_query_events_results);
				

                // checks if there are any results from the search
                if($count == 0){
                    echo "There were no search results!";
                }
                else {
                    // prints search results
					// prints the marble search results
					if ($competitors_count != 0){
						echo "<br> Marbles: <br>";
						while($row = mysqli_fetch_array($search_query_competitors_results)){
							echo $row['competitor_name'];
							echo "<br>";
						}
					}
					// prints the team search results
					if ($teams_count != 0){
						echo "<br> Teams: <br>";
						while($row = mysqli_fetch_array($search_query_teams_results)){
							echo $row['team_name'];
							echo "<br>";
						}
					}
					// prints the event search results
					if($events_count != 0){
						echo "<br> Sports: <br>";
						while($row = mysqli_fetch_array($search_query_events_results)){
							echo $row['sport'].' - Event '.$row['event_number'];
							echo "<br>";
						}
					}
          	 	}
			?>
		</div>
		
		<!-- footer, creates grid -->
		<div class="footer_grid">
			<div class="footer">
				&copy; Jelle's Marble Runs (Janelle Woolley)
			</div>
		</div>
	</body>
</html>
