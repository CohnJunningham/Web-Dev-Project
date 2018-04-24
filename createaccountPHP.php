<?php

	$con = mysqli_connect('localhost','root','');
	
	//Check Connection
	if(!$con)
	{echo "Not Connected to Server";}
	//Check and Select the DB
	if(!mysqli_select_db($con,'useraccounts'))
	{echo "Database not selected";}
	
	//Gather info HTML Form
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//Posting Info to DB
	mysqli_select_db($con,'useraccounts');
	$sql = "INSERT INTO userinfo (Username, Password) VALUES ('$username', '$password')";
	
	//Checking for insertion
	if(!mysqli_query($con,$sql))
	{echo "Not Inserted";}
	
	else
	{echo "Account Created";}
	//Refreshing the html page
	header("refresh:2; url=login.html");


?>