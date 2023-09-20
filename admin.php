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
			// debug code
			if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] != 1){
				echo "Not logged in";
			}
			else {
				echo "Logged In: ".$_SESSION['username'];
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
		
			$users_query = "SELECT * FROM users";
			$users_result = mysqli_query($conn, $users_query);
		
			$rank_query = "SELECT DISTINCT `rank` FROM `users`";
			$edit_rank_result = mysqli_query($conn, $rank_query);
			

		?>
		
		<!--Add Marbles
			Name - insert
			Team - dropdown
			Role - dropdown-->
		<div>
			<!-- Add Marble Form -->
			<form action="insert_marble.php" method="post">
				Name: <input type ="text" name="marble_name" placeholder="Mallard"> <br>
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
		
		<!--Add Teams
			Name - insert
			Hashtag - insert
			Code - insert-->
		<div>
			<!-- Add Team Form -->
			<form action="insert_team.php" method="post">
				Name: <input type ="text" name="team_name" placeholder="Green Ducks"> <br>
				Code: <input type ="text" name="team_code" placeholder="GDK"> <br>
				Hashtag: #<input type ="text" name="team_hashtag" placeholder="QuackAttack"> <br>
				<input type ="submit" value ="Add Team">
			</form>
		</div>
		
		<!--Add Events
			Event - insert
			Team - dropdown
			Sport - insert
			Placement - dropdown
			Points - insert-->
		<div>
			<!-- Add Event Form -->
			<form action="insert_event.php" method="post">
				Event: <input type ="number" name="event_number" placeholder="1"> <br>
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
				Sport: <input type ="text" name="sport" placeholder="Climbing"> <br>
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
				Points: <input type ="number" name="points" placeholder="25"> <br>
				<input type ="submit" value ="Add Event">
			</form>
		</div>
		
		<!--Add Roles + Del
			Name - insert
			Description - insert-->		
		<div>
			<!-- Add Role Form -->
			<form action="insert_role.php" method="post">
				Name: <input type ="text" name="role_name" placeholder="Athlete"> <br>
				Description: <input type ="text" name="description"> <br>
				<input type ="submit" value ="Add Role">
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
					echo "<tr><form action = update_marbles.php method = post>";
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
					echo "<td><select  name='marble_team'>";
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
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete.php?competitor_id=" .$marble_record['competitor_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}	
				
				?>
			</table>
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
					echo "<tr><form action = update_teams.php method = post>";
					// htmlspecialchars from ChatGPT
					echo "<td><input type=text name=team_name value='".htmlspecialchars($edit_teams_record['team_name'], ENT_QUOTES)."'></td>";
					echo "<td>#<input type=text name=hashtag value='".$edit_teams_record['hashtag']."'></td>";
					echo "<td><input type=text name=team_code value='".$edit_teams_record['team_code']."'></td>";
					echo "<td><input type=hidden name=team_id value='".$edit_teams_record['team_id']."'></td>";
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete.php?team_id=" .$edit_teams_record['team_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}
				?>
			</table>
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
					echo "<tr><form action = update_events.php method = post>";
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
					echo "<td><select  name='palcement'>";
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
					echo "<td><a href=delete.php?event_id=" .$edit_events_record['event_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}
				?>
			</table>
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
					echo "<tr><form action = update_roles.php method = post>";
					echo "<td><input type=text name=role value='".$edit_roles_record['role']."'></td>";
					echo "<td><input type=text name=description value='".$edit_roles_record['description']."'></td>";
					echo "<td><input type=hidden name=roles_id value='".$edit_roles_record['roles_id']."'></td>";
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete.php?roles_id=" .$edit_roles_record['roles_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}
				?>
			</table>
		</div>
		
		<!--Owner:
		Edit User
			Name - display
			Rank - dropdown-->
		<div>
			<table>
				<tr>
					<th>Username</th>
					<th>Rank</th>
				</tr>
				<?php
				while($users_record = mysqli_fetch_assoc($users_result)){
					echo "<tr><form action = update_users.php method = post>";
					echo "<td>{$users_record['username']}</td>";
					echo "<td><select  name='rank'>";
					// Reset the record pointer to the beginning of the result set
					mysqli_data_seek($edit_rank_result, 0);
					while($edit_rank_record = mysqli_fetch_assoc($edit_rank_result)){
						// This code is from Phoebe Williamson
						$default_rank = $users_record['rank'];
						$rank_id = $edit_rank_record['rank'];
						$display_rank = $edit_rank_record['rank'];
						$isSelected = ($rank_id == $default_rank) ? 'selected' : '';
						echo "<option value = '$rank_id' $isSelected>$display_rank</option>";
						}
					echo "</select> </td>";
					echo "<td><input type=hidden name=user_id value='".$users_record['user_id']."'></td>";
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete.php?user_id=" .$users_record['user_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}			
				?>
			</table>
		</div>
	</body>
