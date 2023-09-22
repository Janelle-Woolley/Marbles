<DOCTYPE html>

<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> SEARCH - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
    <!-- opens php -->
    <?php
		session_start();
		include '../marbles_mysqli.php';
		?>
		<form method="post">
                	<input type="text" name="search">
                	<input type="submit" name="submit" value="Search" class="search_button">
         </form>
		<?php
            /* searches database to see if the input matches */
            if(isset($_POST['search'])){
                $search = $_POST['search'];

                $search_query_competitors = "SELECT competitor_name
                         					 FROM competitors
                               				 WHERE competitor_name LIKE '%$search%'";
				
				$search_query_teams = "SELECT team_name
                         			  FROM teams
                                	  WHERE team_name LIKE '%$search%'";
				
				$search_query_events = "SELECT DISTINCT event_number, sport
									   FROM events
									   WHERE sport LIKE '%$search%'";
				
                $search_query_competitors_results = mysqli_query($conn, $search_query_competitors);
				$search_query_teams_results = mysqli_query($conn, $search_query_teams);
				$search_query_events_results = mysqli_query($conn, $search_query_events);
                $count = mysqli_num_rows($search_query_competitors_results)+mysqli_num_rows($search_query_teams_results)+mysqli_num_rows($search_query_events_results);
				$competitors_count = mysqli_num_rows($search_query_competitors_results);
				$teams_count = mysqli_num_rows($search_query_teams_results);
				$events_count = mysqli_num_rows($search_query_events_results);
				

                /* checks if there are any results from the search */
                if($count == 0){
                    echo "There were no search results!";
                }
                else{
                    /* prints search results */
					if ($competitors_count != 0){
					echo "<br> Marbles: <br>";
                    while($row = mysqli_fetch_array($search_query_competitors_results)){
						echo $row['competitor_name'];
						echo "<br>";
                    }
					}
					if ($teams_count != 0){
					echo "<br> Teams: <br>";
					while($row = mysqli_fetch_array($search_query_teams_results)){
						echo $row['team_name'];
						echo "<br>";
                    }
					}
					if($events_count != 0){
					echo "<br> Sports: <br>";
					while($row = mysqli_fetch_array($search_query_events_results)){
						echo $row['sport'].' - Event: '.$row['event_number'];
						echo "<br>";
               		}
					}
          	 	}
			}
		?>
	</body>
