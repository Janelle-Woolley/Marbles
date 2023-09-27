<!DOCTYPE html>
	
<!-- Sets document language to english -->
<html lang="en">

    <!-- Creates title (displays in browser bar)
    Sets charset to utf-8 (setting character encoding)
    Links to CSS style sheet-->
    <head>
        <title> OWNER - Jelle's Marble Leauge </title>
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
			$required_rank = "owner"; // set the required rank

			if ($user_rank != $required_rank) {
				header("Location: error.php");
			}
		
			$users_query = "SELECT * FROM users";
			$users_result = mysqli_query($conn, $users_query);
		
			$rank_query = "SELECT DISTINCT `rank` FROM `users`";
			$edit_rank_result = mysqli_query($conn, $rank_query);
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
                	<input type="submit" name="submit" value="Search" class="admin_button">
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
		</div>
		<!--Owner:
		Edit User
			Name - display
			Rank - dropdown-->
		<div class='owner_content'>
		<div class='owner_box'>
			<table>
				<tr>
					<th>Username</th>
					<th>Rank</th>
				</tr>
				<?php
				while($users_record = mysqli_fetch_assoc($users_result)){
					echo "<tr><form action = update_user.php method = post>";
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
					echo "<td><input class='admin_button' type=submit></td>";
					echo "<td><a class='admin_button' href=delete_user.php?user_id=" .$users_record['user_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}			
				?>
			</table>
		</div>
		</div>	
		<div class="footer_grid">
			<!-- footer class from style sheet -->
			<div class="footer">
				footer
			</div>
		</div>
	</body>
