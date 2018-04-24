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
	$username = $_POST['Username'];
	$password = $_POST['password'];
	$database1 = "useraccounts";
	$database2 = "useraccounts";
	$contactusername = $_POST['ContactName'];
	$contactnumber = $_POST['ContactNumber'];


	$db_handle1 = mysqli_connect($server, 'root', '');
	$db_handle2 = mysqli_connect($server, 'root', '');
	$db_found1 = mysqli_select_db($db_handle1, $database1);
	$db_found2 = mysqli_select_db($db_handle2, $database2);
	
	//Verify login info
	if ($db_found1) {
		$infofound = mysqli_query($db_handle1, "SELECT 1 FROM userinfo WHERE `username` = '$username'");
	if ($infofound && mysqli_num_rows($infofound) > 0)

    {
    

    	
    	if($db_found2)
    	{
        	$sql = "INSERT INTO contacts (ContactName, ContactNumber, Username) VALUES ('$contactusername', '$contactnumber', '$username')";
			if(!mysqli_query($db_handle2,$sql))
				{echo "Contact Not Added";}
	
			else
				{echo "Contact Added";}
		}
		else
		{
			echo 'Contact Add Failure1';
		}
    }
	else
    {
	    echo 'Contact Add Failure';
    }
	}
	else 
	{
		print "Database NOT Found.";
	mysqli_close($db_handle);
}
	
	//Refreshing the html page
	header("refresh:8; url=loginwithaddcontact.html");


?>