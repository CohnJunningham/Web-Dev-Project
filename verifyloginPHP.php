<?php

	$con = mysqli_connect('localhost','root','');
	
	//Check Connection
	if(!$con)
	{echo "Not Connected to Server";}
	//Check and Select the DB
	if(!mysqli_select_db($con,'useraccounts'))
	{echo "Database not selected";}
		
	//Variables to be used
	$server = "localhost";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$database = "useraccounts";

	$db_handle = mysqli_connect($server, 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	
	//Verify login info
	if ($db_found) {
		$infofound = mysqli_query($db_handle, "SELECT 1 FROM userinfo WHERE `username` = '$username'");
	if ($infofound && mysqli_num_rows($infofound) > 0)

    {
        echo 'Account Retrieval Successful'; 
    }
	else
    {
	    echo 'Account Retrieval Unsuccessful';
    }
	}
	else 
	{
		print "Database NOT Found.";
	mysqli_close($db_handle);
}
	
	//Refreshing the html page
	header("refresh:7; url=login.html");


?>