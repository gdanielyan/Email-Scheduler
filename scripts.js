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
    e.preventDefault();

	var user = $("#username-signup").val(); 
	var pass = $("#password-signup").val();
	var pass_confirm = $("#password-confirm-signup").val();

    var userValidOrNot = validUsername(user);
    var passValidOrNot = validPassword(pass);

    if(userValidOrNot && passValidOrNot && pass == pass_confirm){
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
    				showMailForm();	//Sucess!
    			}else if(dataBack == 3){
    				$("#sign-up-warnings").html("Username format is incorrect.");
    			}else if(dataBack == 4){
    				$("#sign-up-warnings").html("Password format is incorrect.");
    			}else if(dataBack == 5){
    				$("#sign-up-warnings").html("Password confirmation failed.");
    			}
    		});

    }else if(userValidOrNot === null){
    	$("#sign-up-warnings").html("Username must contain 4 or more characters with no spaces.");
    }else if(passValidOrNot === null){
    	$("#sign-up-warnings").html("Password must contain 8 or more characters, 1 letter, 1 number, and 1 special character.");
    }else if(pass != pass_confirm){
    	$("#sign-up-warnings").html("Password confirmation failed.");
    }

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
    				showMailForm();
    			}else if(dataBack == 3){
    				$("#sign-in-warnings").html("Password entered was wrong.");
    			}
    	});
}

function sendEmail(e){
    e.preventDefault();
    var email = $('#recipient-email').val();
    var date = $('#datepicker').val();
    var hour = $('#hour-select option:selected').val();
    var minute = $('#minute-select option:selected').val();
    var sent = false;

    $.post('webserice.php',
        {
            email: email,
            date: date,
            hour: hour,
            minute: minute,
            sent: sent
        }, function(dataBack){

        });
}

function showMailForm(){
	$("#sign-up").fadeOut();
	$("#sign-in").fadeOut();
	$("#mail-message").delay(300).fadeIn();
    $('#btn-log-out').delay(300).fadeIn();
}


function validPassword(pass){

    var digit = 0, letter = 0, specialChar = 0; 

    function hasSpecialChar(ch){
        return (ch == '!' || ch == '@' || ch == '#' || ch == '$' || ch == '%' || ch == '*' || ch == '(' || ch == ')' || ch == '+' || ch == '=' || ch == '.');
    }

    function hasDigit(ch){
        return !isNaN(ch);
    }

    function isLetter(cha){
        var ch = cha.charCodeAt(0);
        return ( ((ch >= 65) && (ch <= 90)) || ((ch >= 97) && (ch <= 122)) );
    }

    for(var i =0; i<pass.length; i++){
        var c = pass.charAt(i);
        if(hasSpecialChar(c)){
            specialChar++;
        }if(hasDigit(c)){
            digit++;
        }if(isLetter(c)){
            letter++;
        }
    }
    return (specialChar > 0 && digit > 0 && letter > 7);
}

function validUsername(u){//No white space in username
  return !(u.indexOf(' ') >= 0);
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

