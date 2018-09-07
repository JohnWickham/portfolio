window.onload = function() {
	
	// Some browsers (Chrome) pretend to support device motion events, but don't product motion values in the callback. This tracks whether device motion is actually supported after the fact.
	var isElegibleForDeviceMotionEvents = false;
	
	setupStaticAnimation();
	beginObservingDeviceMotion();
	
	function beginObservingDeviceMotion() {
		
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
		
		var deviceRotationAngle = isLandscape ? event.accelerationIncludingGravity.y : -event.accelerationIncludingGravity.x;
		
		let mainImage = $('#wwdc-image');
		mainImage.css("transform", "rotate(" + deviceRotationAngle + "deg)");
		
		let shadowImage = $('#wwdc-image-shadow');
		shadowImage.css("transform", "translateX(" + deviceRotationAngle * -5 + "px)");
		
	}
	
	function setupStaticAnimation() {
		
		if (isElegibleForDeviceMotionEvents == true) {
			return;
		}
		
		var mainImage = $('#wwdc-image');
		
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
			   image.removeClass("animated");// Remove the class so we can re-add it to repeat the animation
		   }
		});
		
	}
	
}