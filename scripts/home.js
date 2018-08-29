window.onload = function() {
	
	// Some browsers (Chrome) pretend to support device motion events, but don't product motion values in the callback. This tracks whether device motion is actually supported after the fact.
	var isElegibleForDeviceMotionEvents = false;
	
	setupStaticAnimation();
	beginObservingDeviceMotion();
	
	function beginObservingDeviceMotion() {
		
		// Begin listening for device motion events
		if (window.DeviceMotionEvent) {
		
			window.ondevicemotion = function(event) {
			
				if (event.acceleration && event.acceleration.x !== null) {
					isElegibleForDeviceMotionEvents = true;
					deviceDidDetectMotion(event);
				}
			
			};
		
		}
		
	}
	
	function deviceDidDetectMotion(event) {
		
		let isLandscape = Math.abs(window.orientation) === 90;
		
		// Get the rotation angle from the devicemotion event
		var rotation = isLandscape ? event.accelerationIncludingGravity.y : -event.accelerationIncludingGravity.x;
		
		// Rotate the image with the rotation angle
		let image = $('#wwdc-image');
		image.css("transform", "rotate(" + rotation + "deg)");
		
		// Also move the shadow accessory image
		let shadow = $('#wwdc-image-shadow');
		shadow.css("transform", "translateX(" + rotation * -5 + "px)");
		
	}
	
	function setupStaticAnimation() {
		
		if (isElegibleForDeviceMotionEvents == true) {
			return;
		}
		
		//Otherwise, perform a static CSS animation on the image
		var image = $('#wwdc-image');
		
		// Don't perform the animation until the image is scrolled into view!
		// Thanks to https://stackoverflow.com/questions/21561480/trigger-event-when-user-scroll-to-specific-element-with-jquery
		$(window).scroll(function() {
		   var hT = image.offset().top,
		       hH = image.outerHeight(),
		       wH = $(window).height(),
		       wS = $(this).scrollTop();
		   if (wS > (hT + hH - wH)) {
		       image.addClass("animated");// The animated class actually has the animation
		   }
		   else if (image.hasClass("animated")) {
			   image.removeClass("animated");// Removing and re-adding the animated class means the animation will happen *each* time the image is scrolled into view
		   }
		});
		
	}
	
}