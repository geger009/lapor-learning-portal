var scrollBtnState = 'down';

// Check state if user scroll using mouse wheel or dragging the scroll bar
$(window).scroll(function() {
	var scTop = $(window).scrollTop();
	if (scTop >= (document.getElementById('lp-top').offsetHeight / 2)) {
		scrollBtnState = 'up';
		document.getElementById('lp-link-top').style.display = 'block';
		document.getElementById('lp-link-bottom').style.display = 'none';
	} else {
		scrollBtnState = 'down';
		document.getElementById('lp-link-top').style.display = 'none';
		document.getElementById('lp-link-bottom').style.display = 'block';
	}
});

// Select all links with hashes
$('a[href*="#"]')
	// Remove links that don't actually link to anything
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event) {
		// On-page links
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({ scrollTop: target.offset().top }, 1000, function() {
					// Callback after animation
					// Must change focus!
					var $target = $(target);
					$target.focus();
					if ($target.is(":focus")) { // Checking if the target was focused
						return false;
					} else {
						$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
						$target.focus(); // Set focus again
					};
				});
			}
		}
	});