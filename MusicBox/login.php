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
	
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	$encryptedPassword=md5($mypassword);
	$sql="SELECT * FROM users WHERE Username='$myusername' and Password='$mypassword'";
	$result=mysql_query($sql);
	
	$count=mysql_num_rows($result);
	
	if($count==1)
	{
		session_start();
		$row = mysql_fetch_array($result);
		$_SESSION['loggedIn']=true;
		$_SESSION['userID']=$row[0];
		$_SESSION['username']=$row[1];
		$_SESSION['password']=$row[2];
		$_SESSION['userType']=$row[3];
		header("location:home.php");		
	}
	else
	{
		header("location:index.php?status=0");
	}
?>