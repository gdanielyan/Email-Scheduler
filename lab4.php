<?php
include('webservice.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Email Scheduler - Lab 4</title>
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Cantora+One">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="title-header">Email<br>Scheduler.</div>

	<div id="sign-in">
		<form id="sign-in-form" class="form-horizontal" method="post">

			<legend>Sign in</legend>
			<input type="text" id="username-signin" class="form-control" placeholder="Username" name="username" required>
			<input type="password" id="password-signin" class="form-control" placeholder="Password" name="password" required>
			<input type="submit" value="Log In" class="btn btn-primary btn-md btn-block"><br>
			<p>Don't have an account? <button id="toggle-sign-up" class="btn btn-success btn-xs" type="button">Click here</button></p>

		</form>
		<p id="sign-in-warnings"></p>
	</div>

	<div id="sign-up">
		<form id="sign-up-form" class="form-horizontal" method="post">

			<legend>Sign up</legend>
			<input type="text" id="username-signup" class="form-control" placeholder="Username" name="username" required>
			<input type="password" id="password-signup" class="form-control" placeholder="Password" name="password" required>
			<input type="password" id="password-confirm-signup" class="form-control" placeholder="Confirm Password" name="password-confirm" required>
			<input type="submit" value="Register" class="btn btn-primary btn-md btn-block"><br>
			<p>Already have an account? <button id="toggle-sign-in" class="btn btn-success btn-xs" type="button">Click here</button></p>

		</form>
		<p id="sign-up-warnings"></p>
	</div>

	<div id="mail-message">
		<form id="message-form" class="form-horizontal" method="post" onsubmit="event.preventDefault();">

			<legend>Email Message</legend>
			<input type="email" id="recipient-email" class="form-control" placeholder="Recipient's Email" name="email" required>
			<input type="date" id="datepicker" class="form-control" placeholder="Date: MM/DD/YYYY" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" name="date" required>
			<label>Time:</label>
			<select id="hour-select" name="hour" required>
				<?php 
					for($i=0; $i<=23; $i++){ echo "<option value=".$i.">$i</option>"; }
				?>
			</select>
			<select id="minute-select" name="minute" required>
				<option value="00">00</option>
				<option value="30">30</option>
			</select>
			<textarea id="email-message" class="form-control" placeholder="Message" rows="10" name="message"></textarea>
			<input type="submit" value="Send" class="btn btn-primary btn-md btn-block">

		</form>
		<p id="mail-warnings"></p>
	</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts.js"></script>

</body>
</html>