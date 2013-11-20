<!DOCTYPE html>

<?php session_start();
		if(!empty($_SESSION))
		{
			header("location:home.php");
		}
	?>
<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>AC32005 - Music Suggestions - Hci And Usability Engineering - Login</title>
	</head>
	
	<body>
		<div align = "center">
			<div align = "center">
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
			</div>
		
			<!--<div align = "center">
				<p>The login name is just for you to see, no one can see it. </p>
			</div>-->
			
			<div id = "box">
				<p class ="center">
				
				<?php
				if (!empty($_GET))
				{
					if ($_GET['status']==0)
					{
						echo('</p> <p class = "center", style="color: red;"> Username/password not recognised, please try again.');
					}
					else if ($_GET['status']==1)
					{
						echo('</p> <p class = "center", style="color: green;"> Account successfully created.');
					}
				}
				?>
				
				</p>
				
				<form action="login.php" method="post">
				
					<br>Username:<br><input type="text" name="username"></br>
				
					<br>Password:<br><input type="password" name="password"></br>
				
					<br><input type="submit" value ="Log In">
				
				</form>
				<br>
				<p class = "center"> Need an Account? </p>
				
				<button type="button" value="LoL" onclick="location.href='register.php'" />Register</button>
			</div>
		</div>
	</body>
</html>