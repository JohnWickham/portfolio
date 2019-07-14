$(document).ready(function() {
	
	$('#contact-navigation-item').click(function() {
		
		// Load the contact-modal stylesheet
		$('head').append('<link rel="stylesheet" type="text/css" href="/contact/modal/contact-modal.css">');
		
		// Load the modal markup content
		$('#contact-modal-container').load('/contact/modal/contact-modal.html');
		
	});
	
});