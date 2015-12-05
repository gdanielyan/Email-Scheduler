<? php
	
	//Credentials
	$servername = "localhost";
	$username = "root";
	$password = "";

	//Create connection
	$dbase = mysql_connect($servername, $username, $password);

	//Check connection
	if(!$dbase){
		die("Connection failed: " . mysqli_connect_error());
	} else {
		mysql_select_db("user", $dbase);
	}

	$sql = "INSERT INTO user(username, password) 
			VALUES('', '')"

	

	mysql_close($conn);
?>