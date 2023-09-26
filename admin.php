<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> ADMIN - Jelle's Marble Leauge </title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
		<!-- opens php -->
    	<?php
			session_start();
			include '../marbles_mysqli.php';
		
			if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] != 1){
			header("Location: error.php");
			}
			
			$username = $_SESSION['username'];
			if(!$username){
			header("Location: error.php");
			}

			$user_rank_query = "SELECT * FROM users WHERE username = '$username'";
			$user_rank_result = mysqli_query($conn, $user_rank_query);
			$user_rank_record = mysqli_fetch_assoc($user_rank_result);

			$user_rank = $user_rank_record['rank']; // Store the user's rank in a variable
			$unallowed_rank = "user"; // set the rank not allowed on the page

			// need to use the 'user' rank for the loop due to there being 2 roles allowed to access the page
			// if rank != required_rank1 or rank != required_rank2 will always be false, therefore noone can access the page
			if ($user_rank == $unallowed_rank) {
				header("Location: error.php");
			}
		
			$team_query = "SELECT * FROM teams";
			$team_result = mysqli_query($conn, $team_query);
			$event_team_result = mysqli_query($conn, $team_query);
			$edit_marble_team_result = mysqli_query($conn, $team_query);
			$edit_teams_result = mysqli_query($conn, $team_query);
			$edit_event_team_result = mysqli_query($conn, $team_query);
		
			$role_query = "SELECT * FROM roles";
			$role_result = mysqli_query($conn, $role_query);
			$edit_marble_role_result = mysqli_query($conn, $role_query);
			$edit_role_result = mysqli_query($conn, $role_query);
		
			$marble_query = "SELECT competitors.competitor_id, competitors.competitor_name, teams.team_name, roles.role, competitors_roles.roles_id, 
							 competitors_roles.competitor_id, teams.team_id
							 FROM competitors, roles, teams, competitors_roles 
							 WHERE competitors.team_id = teams.team_id 
							 AND roles.roles_id = competitors_roles.roles_id 
							 AND competitors.competitor_id = competitors_roles.competitor_id";
			$marble_result = mysqli_query($conn, $marble_query);
		
			$placement_query = "SELECT DISTINCT placement FROM events";
			$placement_result = mysqli_query($conn, $placement_query);
			$edit_placement_result = mysqli_query($conn, $placement_query);
			
			$event_query = "SELECT * FROM events, teams
							WHERE events.team_id = teams.team_id
							ORDER BY event_number ASC";
			$event_result = mysqli_query($conn, $event_query);
		
		?>
		
		<!-- creates grid -->
		<div class="grid-container fixed-nav">
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
				<a href="#marbles">Edit Marbles</a>
				<a href='#extra_roles'>Give Marble Extra Role</a>
				<a href="#teams">Edit Teams</a>
				<a href="#events">Edit Events</a>
				<a href="#roles">Edit Roles</a>
			</div>
		</div>

		<div class="admin_content">
		<div id="marbles" class="admin_box top-content">
		<!--Add Marbles
			Name - insert
			Team - dropdown
			Role - dropdown-->
		
			<h1> Edit Marbles</h1>	
		<div>
			<!-- Add Marble Form -->
			<form action="insert_marble.php" method="post">
				Name: <input type ="text" name="marble_name" placeholder="Mallard" required> <br>
				Team: <select  name="marble_team">
						<!-- options -->
						<?php
							while($team_record = mysqli_fetch_assoc($team_result)){
								echo "<option value = '". $team_record['team_id'] . "'>";
								echo $team_record['team_name'];
								echo "</option>";
							}
						?>
						</select> 
						<br>
				Role: <select  name="marble_role">
						<!-- options -->
						<?php
							while($role_record = mysqli_fetch_assoc($role_result)){
								echo "<option value = '". $role_record['roles_id'] . "'>";
								echo $role_record['role'];
								echo "</option>";
							}
						?>
						</select> 
						<br>
				<input type ="submit" value ="Add Marble">
			</form>
		</div>
			
		<!--Edit Marbles + Del
			Name - insert
			Team - dropdown
			Role - dropdown-->
		<div>
			<table>
				<tr>
					<th>Name</th>
					<th>Team</th>
					<th>Role</th>
				</tr>
				<?php
				while($marble_record = mysqli_fetch_assoc($marble_result)){
					echo "<tr><form action = update_marble.php method = post>";
					echo "<td><input type=text name=marble_name value='".$marble_record['competitor_name']."'></td>";
					echo "<td><select  name='marble_team'>";
					// Reset the record pointer to the beginning of the result set
					mysqli_data_seek($edit_marble_team_result, 0);
					while($edit_marble_team_record = mysqli_fetch_assoc($edit_marble_team_result)){
						// This code is from Phoebe Williamson
						$default_team = $marble_record['team_id'];
						$team_id = $edit_marble_team_record['team_id'];
						$display_team = $edit_marble_team_record['team_name'];
						$isSelected = ($team_id == $default_team) ? 'selected' : '';
						echo "<option value = '$team_id' $isSelected>$display_team</option>";
						}
					echo "</select> </td>";
					echo "<td><select  name='marble_role'>";
					// Reset the record pointer to the beginning of the result set
					mysqli_data_seek($edit_marble_role_result, 0);
					while($edit_marble_role_record = mysqli_fetch_assoc($edit_marble_role_result)){
						// This code is from Phoebe Williamson
						$default_role = $marble_record['roles_id'];
						$role_id = $edit_marble_role_record['roles_id'];
						$display_role = $edit_marble_role_record['role'];
						$isSelected = ($role_id == $default_role) ? 'selected' : '';
						echo "<option value = '$role_id' $isSelected>$display_role</option>";
						}
					echo "</select> </td>";
					echo "<td><input type=hidden name=competitor_id value='".$marble_record['competitor_id']."'></td>";
					echo "<td><input type=hidden name=current_role value='".$marble_record['roles_id']."'></td>";
					echo "<td><input type=hidden name=current_team value='".$marble_record['team_id']."'></td>";
					echo "<td><input type=hidden name=current_name value='".$marble_record['competitor_name']."'></td>";
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete_marble.php?competitor_id=" .$marble_record['competitor_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}	
				
				?>
			</table>
		</div>
		</div>
		
		<h1> Give Marble Extra Role </h1>
			
		<div id="teams" class="admin_box">
		<!--Add Teams
			Name - insert
			Hashtag - insert
			Code - insert-->
		<h1> Edit Teams </h1>
		<div>
			<!-- Add Team Form -->
			<form action="insert_team.php" method="post">
				Name: <input type ="text" name="team_name" placeholder="Green Ducks" required> <br>
				Code: <input type ="text" name="team_code" placeholder="GDK" required> <br>
				Hashtag: #<input type ="text" name="team_hashtag" placeholder="QuackAttack" required> <br>
				<input type ="submit" value ="Add Team">
			</form>
		</div>
		
		<!--Edit Teams + Del
			Name - insert
			Hashtag - insert
			Code - insert-->
		<div>
			<table>
				<tr>
					<th>Name</th>
					<th>Hashtag</th>
					<th>Code</th>
				</tr>
				<?php
				while($edit_teams_record = mysqli_fetch_assoc($edit_teams_result)){
					echo "<tr><form action = update_team.php method = post>";
					// htmlspecialchars from ChatGPT
					echo "<td><input type=text name=team_name value='".htmlspecialchars($edit_teams_record['team_name'], ENT_QUOTES)."'></td>";
					echo "<td>#<input type=text name=hashtag value='".$edit_teams_record['hashtag']."'></td>";
					echo "<td><input type=text name=team_code value='".$edit_teams_record['team_code']."'></td>";
					echo "<td><input type=hidden name=team_id value='".$edit_teams_record['team_id']."'></td>";
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete_team.php?team_id=" .$edit_teams_record['team_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}
				?>
			</table>
		</div>
		</div>
		
		<div id="events" class="admin_box">
		<!--Add Events
			Event - insert
			Team - dropdown
			Sport - insert
			Placement - dropdown
			Points - insert-->
			<h1> Edit Events </h1>
		<div>
			<!-- Add Event Form -->
			<form action="insert_event.php" method="post">
				Event: <input type ="number" name="event_number" placeholder="1" required> <br>
				Sport: <input type ="text" name="sport" placeholder="Climbing" required> <br>
				Team: <select  name="marble_team">
						<!-- options -->
						<?php
							while($event_team_record = mysqli_fetch_assoc($event_team_result)){
								echo "<option value = '". $event_team_record['team_id'] . "'>";
								echo $event_team_record['team_name'];
								echo "</option>";
							}
						?>
						</select> 
						<br>
				Placment: <select  name="event_placement">
						<!-- options -->
						<?php
							while($placement_record = mysqli_fetch_assoc($placement_result)){
								echo "<option value = '". $placement_record['placement'] . "'>";
								echo $placement_record['placement'];
								echo "</option>";
							}
						?>
						</select> 
						<br>
				Points: <input type ="number" name="points" placeholder="25" required> <br>
				<input type ="submit" value ="Add Event">
			</form>
		</div>
		
		<!--Edit Events + Del
			Event - insert
			Team - dropdown
			Sport - insert			
			placement - dropdown
			points - insert-->
		<div>
			<table>
				<tr>
					<th>Event</th>
					<th>Sport</th>
					<th>Team</th>
					<th>Placement</th>
					<th>Points</th>
				</tr>
				<?php
				while($edit_events_record = mysqli_fetch_assoc($event_result)){
					echo "<tr><form action = update_event.php method = post>";
					echo "<td><input type=text name=event_number value='".$edit_events_record['event_number']."'></td>";
					echo "<td><input type=text name=sport value='".$edit_events_record['sport']."'></td>";
					echo "<td><select  name='event_team'>";
					// Reset the record pointer to the beginning of the result set
					mysqli_data_seek($edit_event_team_result, 0);
					while($edit_event_team_record = mysqli_fetch_assoc($edit_event_team_result)){
						// This code is from Phoebe Williamson
						$default_team = $edit_events_record['team_id'];
						$team_id = $edit_event_team_record['team_id'];
						$display_team = $edit_event_team_record['team_name'];
						$isSelected = ($team_id == $default_team) ? 'selected' : '';
						echo "<option value = '$team_id' $isSelected>$display_team</option>";
						}
					echo "</select> </td>";
					echo "<td><select  name='placement'>";
					// Reset the record pointer to the beginning of the result set
					mysqli_data_seek($edit_placement_result, 0);
					while($edit_placement_record = mysqli_fetch_assoc($edit_placement_result)){
						// This code is from Phoebe Williamson
						$default_placement = $edit_events_record['placement'];
						$placement_id = $edit_placement_record['placement'];
						$display_placement = $edit_placement_record['placement'];
						$isSelected = ($placement_id == $default_placement) ? 'selected' : '';
						echo "<option value = '$placement_id' $isSelected>$display_placement</option>";
						}
					echo "</select> </td>";
					echo "<td><input type=text name=points value='".$edit_events_record['points']."'></td>";
					echo "<td><input type=hidden name=event_id value='".$edit_events_record['event_id']."'></td>";
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete_event.php?event_id=" .$edit_events_record['event_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}
				?>
			</table>
		</div>	
		</div>
		
		<div id="roles" class="admin_box">
		<!--Add Roles + Del
			Name - insert
			Description - insert-->
			<h1> Edit Roles </h1>
		<div>
			<!-- Add Role Form -->
			<form action="insert_role.php" method="post">
				Name: <input type ="text" name="role_name" placeholder="Athlete" required> <br>
				Description: <input type ="text" name="description" required> <br>
				<input type ="submit" value ="Add Role">
			</form>
		</div>
		
		<!--Edit Roles + Del
			Name - insert
			description - insert-->
		<div>
			<table>
				<tr>
					<th>Name</th>
					<th>Description</th>
				</tr>
				<?php
				while($edit_roles_record = mysqli_fetch_assoc($edit_role_result)){
					echo "<tr><form action = update_role.php method = post>";
					echo "<td><input type=text name=role value='".$edit_roles_record['role']."'></td>";
					echo "<td><input type=text name=description value='".$edit_roles_record['description']."'></td>";
					echo "<td><input type=hidden name=roles_id value='".$edit_roles_record['roles_id']."'></td>";
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete_role.php?roles_id=" .$edit_roles_record['roles_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}
				?>
			</table>
		</div>
		</div>
		</div>
			
		<div class="footer_grid">
			<!-- footer class from style sheet -->
			<div class="footer">
				footer
			</div>
		</div>	
	</body>
