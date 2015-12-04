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