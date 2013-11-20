<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>AC32005 - Music Suggestions - Hci And Usability Engineering - Registration</title>
	</head>
	<body>
		<div align = "center">
			<div align = "center">
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
			</div>
			<div id = "box">
				<?php
				if (!empty($_GET))
				{
					if ($_GET['status']==0)
					{
						echo('<p class = "center", style="color: red;">Passwords did not match.</p>');
					}
					else if ($_GET['status']==1)
					{
						echo('<p class = "center", style="color: red;">Please enter a username.</p>');
					}
				}
				?>
				
				<form action="checkReg.php" method="post">
					<p>Username:<br><input type="text" name="username"></p>
				
					<p>Password:<br><input type="password" name="password"></p>
				
					<p>Confirm Password:<br><input type="password" name="passwordConf"></p>
				
					<p>Please enter the following details to register:</p>
					
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</body>
</html>