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
				nav
			</div>
			
			<!-- anchor_bar class from style sheet -->
			<div class="grid-item anchor_bar">
				anchor
			</div>
			
			<!-- content class from style sheet -->
			<div class="grid-item content">
				content
			</div>
			
			
			<!-- footer class from style sheet -->
			<div class="grid-item footer">
				footer
			</div>	
		</div>
