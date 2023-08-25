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
			include '../marbles_mysqli.php';
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
            	</nav>
			</div>
			
			<!-- anchor_bar class from style sheet -->
			<div class="grid-item anchor_bar">
				<?php
				if(isset($_GET['event'])){
					$id = $_GET['event'];
				}else{
					$id = 1;
				}
				
				?>
				<!-- Student Form -->
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
				
				
				$this_student_query = "SELECT events.placement, teams.team_name, events.points FROM teams, events WHERE teams.team_id = events.team_id AND events.event_number = '" . $id ."'";
				$this_student_result = mysqli_query($conn, $this_student_query);

				while($this_student_record = mysqli_fetch_assoc($this_student_result)){
				echo $this_student_record['placement']." ".$this_student_record['team_name']." ".$this_student_record['points']."<br>";
				}
				?>
			</div>
			
			
			<!-- footer class from style sheet -->
			<div class="grid-item footer">
				footer
			</div>	
		</div>
