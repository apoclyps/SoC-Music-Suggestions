<?php 
	$host="127.0.0.1"; // Host name 
	$username="root"; // Mysql username 
	$password="hellokitty"; // Mysql password
	$encryptedPassword="";
	$db_name="test"; // Database name 
	$tbl_name="users"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$myusername=$_POST['username']; 
	$mypassword=$_POST['password'];
	$passwordConf=$_POST['passwordConf'];
	
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$passwordConf = mysql_real_escape_string($passwordConf);
	if ($mypassword==$passwordConf && $myusername!="")
	{
		$encryptedPassword=md5($mypassword);
		$sql="INSERT INTO users (Username, Password, userType) VALUES ('$myusername', '$encryptedPassword', 'student')";
		mysql_query($sql);
		header("location:index.php?status=1");
	}
	else if ($myusername == "" )
	{
		header("location:register.php?status=1");
	}
	else
	{
		header("location:register.php?status=0");
	}
?>