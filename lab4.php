<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<style type="text/css">
		#sign-in, #sign-up, #mail-message {
			border: 1px solid #D3D3D3;
			border-radius: 3px;
			margin:10px;
			padding:20px;
			width: 320px;
			display:inline-block;
			position: absolute;
			float: left;
			clear: both;
			top: 35%;
			left: 50%;
			transform: translate(-50%, -50%);	
		}

		#sign-up-form, #sign-in-form {
			width: 270px;
		}

		#mail-message, #sign-up {
			display: none;
		}

		#mail-message {
			width: 440px;
		}
		
		input, select, textarea {
			margin: 5px;
		}

		textarea {
			resize: none;
		}

		#datepicker {
			display: inline-block;
			margin-right: 15px;
			width: 50%;
		}

		form p {
			margin-left: 10px;
		}

	</style>
</head>
<body>

	<div id="sign-in">
		<form id="sign-in-form" class="form-horizontal" method="post">

			<legend>Sign in</legend>

			<input type="text" id="username-signin" class="form-control" placeholder="Username" name="username">

			<input type="password" id="password-signin" class="form-control" placeholder="Password" name="password">

			<input type="submit" value="Log In" class="btn btn-primary btn-md btn-block"><br>
			<p>Don't have an account? <button id="toggle-sign-up" class="btn btn-success btn-xs">Click here</button></p>

		</form>
	</div>

	<div id="sign-up">
		<form id="sign-up-form" class="form-horizontal" method="post">

			<legend>Sign up</legend>

			<input type="text" id="username-signup" class="form-control" name="username" placeholder="Username">

			<input type="password" id="password-signup" class="form-control" name="password" placeholder="Password">

			<input type="password" id="password-confirm-signup" class="form-control" name="password-confirm" placeholder="Confirm Password">

			<input type="submit" value="Register" class="btn btn-primary btn-md btn-block"><br>
			<p>Already have an account? <button id="toggle-sign-in" class="btn btn-success btn-xs">Click here</button></p>

		</form>
	</div>

	<div id="mail-message">
		<form id="message-form" class="form-horizontal" method="post">

			<legend>Email Message</legend>

			<input type="email" id="recipient-email" class="form-control" placeholder="Recipient's Email" name="email">

			<input type="text" id="datepicker" class="form-control" placeholder="Date">

			<label>Time:</label>
			<select id="hour-select" name="hour">
				<?php
					for($i=0; $i<=23; $i++){
						echo "<option value='$i'>$i</option>";
					}
				?>
			</select>
			
			<select id="minute-select" name="minute">
				<option value="00">00</option>
				<option value="30">30</option>
			</select>
			
			<textarea id="email-message" class="form-control" placeholder="Message" rows="10"></textarea>

			<input type="submit" value="Send" class="btn btn-primary btn-md btn-block">
		</form>
	</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function($) {

		$("#toggle-sign-in").click(function(e){
			e.preventDefault();
			$("#sign-up").fadeOut();
			$("#sign-in").delay(500).fadeIn();
			
		});

		$("#toggle-sign-up").click(function(e){
			e.preventDefault();
			$("#sign-in").fadeOut();
			$("#sign-up").delay(500).fadeIn();
		});
	});
</script>
</body>
</html>