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

	$action = $_POST['action'];

	if($action == 'signin'){
		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sqlQuery = "SELECT * FROM users WHERE username = '$user'";
		$result = mysqli_query($connection, $sqlQuery);
		$row = mysqli_fetch_assoc($result);
		if(!$row){
			echo 1;//Empty result means that username does not exist
		}else if ((strcmp($pass, $row['password'])) == 0){
			echo 2; //Password matchs db.. redirect to mail page
		}else{
			echo 3; //Entered wrong password...
		}

	}else if($action == 'signup'){
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$pass_confirm = $_POST['password_confirm'];

		$choice = validateUser($user, $pass, $pass_confirm);

		switch($choice){
			//Username already exists
			case 1:
				echo 1; //means username already exists;
				break;
			//Everything good, we can register the user
			case 2:
				$sqlQuery = "INSERT INTO users (username, password) VALUES ( '{$user}', '{$pass}' )";
				mysqli_query($connection, $sqlQuery);
				break;
			//Problem with username 
			case 3:
				echo 3;//Means there is problem with the username the user chose
				break;
			//Problem with password
			case 4:
				echo 4;//Means there is a problem with the password the user chose
				break;
			case 5: 
				echo 5;//Means that password confirmation was incorrect
				break;
			//Default
			default:
		}

	}else if($action == 'message'){


	}

	function validateUser($user, $pass, $pass_confirm){

		$valueToRetun;

		$usernamePattern = '\b([a-z]+[0-9]+|[0-9]+[a-z]+)[a-z0-9]*\b';
		$passwordPattern = '/(^(?=.*[^a-zA-Z0-9])(?=.*[a-zA-Z])(?=.*[0-9])\S{8,}$)/';

		$validUsernameOrNot = preg_match($usernamePattern, $user);
		$validPasswordOrNOt = preg_match($passwordPattern, $pass);

		//check to see if username exists
		$sqlQuery = "SELECT * FROM users WHERE username = '$user'";
		$result = mysqli_query($connection, $sqlQuery);
		$row = mysqli_fetch_assoc($result);
		if($row)
			$valueToReturn = 1;//Username already exits
		if($validUserNameOrNot && $validPasswordOrNot){
			$valueToReturn = 2;//Username and password is valid
		}else if(!$validUserNameOrNot){
			$valueToReturn = 3;//Username is not valid format
		}else if(!$validPasswordOrNot){
			$valueToReturn = 4;//Password is not valid format
		}else if(strcmp($pass, $pass_confirm) !== 0){
			$valueToReturn = 5;//Password confirmation is incorrect
		}

		return $valueToReturn;
	}

	//Close connection to db
	mysqli_close($connection);
?>