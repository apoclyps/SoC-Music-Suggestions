<?php 
	session_start();
	$host="127.0.0.1"; // Host name 
	$username="root"; // Mysql username 
	$password="hellokitty"; // Mysql password
	$encryptedPassword="";
	$db_name="test"; // Database name 
	$tbl_name="users"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$mytitle=$_POST['title']; 
	$mymessage=$_POST['message'];
	
	$mytitle = stripslashes($mytitle);
	$mymessage = stripslashes($mymessage);
	$mytitle = mysql_real_escape_string($mytitle);
	$mymessage = mysql_real_escape_string($mymessage);

	$nowFormat = date('Y-m-d H:i:s');
	
	$sql="INSERT INTO posts (title, message, datetime) VALUES ('$mytitle', '$mymessage', '$nowFormat')";
	mysql_query($sql);

	$sql="SELECT ID FROM posts WHERE title = '$mytitle' AND message = '$mymessage'";
	$result = mysql_query($sql);
	//<!--$row = mysql_fetch_array($result);-->

	$sql=sprintf("INSERT INTO users_has_posts VALUES(%s,%s)", $_SESSION['userID'], $result);
	mysql_query($sql);

	
	
	header("location:home.php");

?>