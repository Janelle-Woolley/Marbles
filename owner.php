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
					echo "<td><input type=submit></td>";
					echo "<td><a href=delete_user.php?user_id=" .$users_record['user_id']. ">Delete</a></td>";
					echo "</form></tr>";
				}			
				?>
			</table>
		</div>
	</body>
