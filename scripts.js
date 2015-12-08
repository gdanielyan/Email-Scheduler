window.addEventListener("load", start, false);

function start(){
	$("#sign-in-form").submit(function(e){
		signInUser(e);
	});

	$("#sign-up-form").submit(function(e){
		registerUser(e);
	});

	$("#message-form").submit(function(e){
		buildEmail(e);
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
    }else if(userValidOrNot === null){
    	$("#sign-up-warnings").html("Username must contain 8-32 characters/numbers.");
    }else if(passValidOrNot === null){
    	$("#sign-up-warnings").html("Password must contain 8 or more characters, with 1 letter, 1 number, and 1 special char.");
    }else{
    	//Carry out to php
    	
    }

    e.preventDefault();
}

function signInUser(e){
	e.preventDefault();
	var user = $("#username-signin").val(); 
	var pass = $("#password-signin").val();

	//carry out to php
}

function buildEmail(e){
	e.preventDefault();

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

