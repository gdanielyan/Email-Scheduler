window.addEventListener("load", start, false);

function start(){

	$("#sign-in-form").submit(function(event){
		
		
		
		event.preventDefault();
	});

	$("#sign-up-form").submit(function(event){

		//Validate username, password confirmation, and 
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