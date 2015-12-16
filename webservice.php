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
		}else if ((strcmp($pass, $row['password'])) === 0){
			echo 2; //Password matchs db.. redirect to mail page
		}else{
			echo 3; //Entered wrong password...
		}

		mysql_free_result($result);

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
				echo 2;
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
		}

	}else if($action == 'message'){


	}

	function validateUser($user, $pass, $pass_confirm){

		$valueToRetun = 0;

		$validUsernameOrNot = validUsername($user);
		$validPasswordOrNot = validPassword($pass);

		//check to see if username exists
		$sqlQuery = "SELECT * FROM users WHERE username = '$user'";
		$result = mysqli_query($connection, $sqlQuery);
		$row = mysqli_fetch_assoc($result);

		if($row != "")
			$valueToReturn = 1;//Username already exits
		else if($validUsernameOrNot && $validPasswordOrNot){
			$valueToReturn = 2;//Username and password is valid
		}else if(!$validUsernameOrNot){
			$valueToReturn = 3;//Username is not valid format
		}else if(!$validPasswordOrNot){
			$valueToReturn = 4;//Password is not valid format
		}else if(strcmp($pass, $pass_confirm) !== 0){
			$valueToReturn = 5;//Password confirmation is incorrect
		}

		mysql_free_result($result);
		return $valueToReturn;
	}

	function validPassword($pass){

	    $digit = 0;
	    $letter = 0; 
	    $specialChar = 0;

	    function hasSpecialChar($ch){
	        return ($ch == '!' || $ch == '@' || $ch == '#' || $ch == '$' || $ch == '%' || $ch == '*' || $ch == '(' || $ch == ')' || $ch == '+' || $ch == '=' || $ch == '.');
	    }
	    function hasDigit($ch){
	        return is_numeric($ch);
	    }
	    function isLetter($cha){
	        return ctype_alpha($cha);
	    }

	    for($i = 0; $i < strlen($pass); $i++){
	        $c = substr($pass, $i, 1);
	        if(hasSpecialChar($c)){
	            $specialChar++;
	        }if(hasDigit($c)){
	            $digit++;
	        }if(isLetter($c)){
	            $letter++;
	        }
	    }

	    return ($specialChar > 0 && $digit > 0 && $letter > 0 && strlen($pass) >= 8);
	}

	function validUsername($u){
		$user = trim($u);
		return ((!preg_match('/\\s/',$user)) && strlen($user) >= 4);
	}

	//Close connection to db
	mysqli_close($connection);
?>