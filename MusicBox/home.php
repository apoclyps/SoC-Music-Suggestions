<!DOCTYPE html>
<?php session_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="hellokitty"; // Mysql password

	$linkcon = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("test", $linkcon)or die("cannot select DB1"); ?>
	
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>MSAS - Your posts</title>
	</head>
	
	<body>
	<?php
		if(empty($_SESSION))
		{
			header("location:index.php");
		}
	?>
		<div align = "center">
			<div align = "center">
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
				<p class="homebuttons"> <a href="submitquestion.php">Submit a Song</a> || <a href="logout.php">Log out</a>
				<p class="homebuttons" style="font-weight: bold"> Existing Songs: </p>
			</div>

			<?php
			if ($_SESSION['userType'] == "student")
			{
				$getPostsQuery = sprintf('SELECT * FROM users_has_posts WHERE Users_ID = %s', $_SESSION['userID']);
				$linkresult=mysql_query($getPostsQuery);
				if (!$linkresult)
				{
					die('Invalid query: ' . mysql_error());
				}
				else
				{
					while($row = mysql_fetch_array($linkresult))
					{
						$getSingleQuery = sprintf('SELECT * FROM posts WHERE Posts_ID = %s', $row['ID']);
						$singleresult=mysql_query($getSingleQuery);
						$singlerow = mysql_fetch_array($singleresult);
						echo '<div id ="newBox">';
						echo sprintf('<p class = "title">%s</p> <p class = "replies">%s</p><br><br><br> <p class = "message">%s</p>', $singlerow['title'], $singlerow['datetime'], $singlerow['message']);
						echo "</div>";
					}
				}
			}
			else if ($_SESSION['userType'] == "advisor")
			{
				$getPostsQuery = sprintf('SELECT * FROM posts ORDER BY Datetime DESC');
				$linkresult=mysql_query($getPostsQuery);
				
				if (!$linkresult)
				{
					die('Invalid query: ' . mysql_error());
				}
				else
				{
					while($row = mysql_fetch_array($linkresult))
					{
						echo '<div id ="newBox">';
						echo sprintf('<p class = "title">%s</p> <p class = "replies">%s</p><br><br><br> <p class = "message">%s</p>', $row['Title'], $row['Datetime'], $row['Message']);
						echo "</div>";
					}
				}
			}
			else 
			{
				echo('Invalid User');
			}
			?>
		</div>
	</body>
</html>