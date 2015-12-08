<?php
	
	//DB connection credentials
	$db_host = "localhost";
	$db_name = "lab4";
	$dbusername = "root";
	$password = "root";

	$connection = mysqli_connect($db_host, $dbusername, $password, $db_name);

	//Test if connection occured
	if (mysqli_connect_errno()) {
		die("Database Connection Failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
	}
	
	//Build the query
	$query = "SELECT * FROM users";
	$result = mysqli_query($connection, $query);

	if(!$result){
		die("Database query failed");
	}


	echo "<pre>";
	while($row = mysqli_fetch_row($result)){
		var_dump($row);
		echo "<hr/>";
	}
	echo "</pre>";
	//sign up - server side validation and create account
		//log user in

	//sign in - verify that the username and password match
		//log user in


	//send message - send to the db

	//sign out


	//Close connection to db
	mysqli_close($connection);
?>