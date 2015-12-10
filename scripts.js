window.addEventListener("load", start, false);

function start(){
	$("#sign-in-form").submit(function(e){
		signInUser(e);
	});

	$("#sign-up-form").submit(function(e){
		registerUser(e);
	});

	$("#message-form").submit(function(e){
		sendEmail(e);
	});
}

function registerUser(e){

	var user = $("#username-signup").val(); 
	var pass = $("#password-signup").val();
	var pass_confirm = $("#password-confirm-signup").val();

	var userPattern = /^[a-zA-Z0-9]{8,32}$/;
	var passPattern = /(^(?=.*[^a-zA-Z0-9])(?=.*[a-zA-Z])(?=.*[0-9])\S{8,}$)/;

    var userValidOrNot = user.match(userPattern);
    var passValidOrNot = pass.match(passPattern);

    if(userValidOrNot && passValidOrNot){
    	$("#sign-up-warnings").html("");
    	$.post('webservice.php', 
    		{ 
    			username: user, 
    			password: pass,
    			password_confirm: pass_confirm,
    			action: 'signup'
    		}, function(dataBack){
    			if(dataBack == 1){
    				$("#sign-up-warnings").html("Username already exists.");
    			}else if(dataBack == 2){
    				$("#sign-up-warnings").css("color", "green").html("Success");
    				nextStep();	//Sucess!
    			}else if(dataBack == 3){
    				$("#sign-up-warnings").html("Username format is incorrect.");
    			}else if(dataBack == 4){
    				$("#sign-up-warnings").html("Password format is incorrect.");
    			}else if(dataBack == 5){
    				$("#sign-up-warnings").html("Password confirmation failed.");
    			}
    		});

    }else if(userValidOrNot === null){
    	$("#sign-up-warnings").html("Username must contain 8-32 characters/numbers.");
    }else if(passValidOrNot === null){
    	$("#sign-up-warnings").html("Password must contain 8 or more characters, with 1 letter, 1 number, and 1 special char.");
    }else if(!(pass === pass_confirm)){
    	$("#sign-up-warnings").html("Password confirmation failed.");
    }

    e.preventDefault();
}

function signInUser(e){
	e.preventDefault();
	var user = $("#username-signin").val(); 
	var pass = $("#password-signin").val();

	$.post('webservice.php',
		{
			username: user,
			password: pass,
			action: 'signin'
		}, function(dataBack){
    			if(dataBack == 1){
    				$("#sign-in-warnings").html("Username cannot be found.");
    			}else if(dataBack == 2){
    				$("#sign-in-warnings").css("color", "green").html("Success");
    				nextStep();
    			}else if(dataBack == 3){
    				$("#sign-in-warnings").html("Password entered was wrong.");
    			}
    	});
}

function sendEmail(e){


}

function nextStep(){
	$("#sign-up").fadeOut();
	$("#sign-in").fadeOut();
	$("#mail-message").fadeIn();
}





//Toggle between sign-in and sign-up forms
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

