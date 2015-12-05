window.addEventListener("load", start, false);

function validateSignUp(passWord, confirmPassword{

	function isUsernameGood(userName){
		
	}

	function isPasswordGood(passWord){
		var pattern = new RegExp("^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$");
		return pattern.test(passWord);
	}

	function doPasswordsMatch(){
		return password === confirmPassword;
	}

	return isPasswordGood(passWord);
}

function start(){

	$("#sign-in-form").submit(function(event){

		event.preventDefault();
	});

	$("#sign-up-form").submit(function(event){
		//get username and password
		var password = $("#sign-up-form input[name=password]").val();
		var confirmPassword = $("#sign-up-form input[name=password-confirm]").val();

		event.preventDefault();
	});

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