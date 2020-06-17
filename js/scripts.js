(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$('.hamburger').on('click',function(e){
			e.preventDefault();
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$('header').removeClass('active');
			} else {
				$(this).addClass('active');
				$('header').addClass('active');
			}
		});

		$('li.menu-item-has-children > a').on('click',function(e){
			if( $(window).width() <= 1023 ){
				e.preventDefault();
			}
			$(this).parent().toggleClass('active');
		});

		// Smooth scrolling when clicking on a hash link
		// Add smooth scrolling to all links
		$("a").on('click', function(event) {

			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== "") {

				// Store hash
				var hash = this.hash;
				if($('header').hasClass('active')){
					$('header').removeClass('active');
					$('.hamburger').removeClass('active');
				}

				$('a[href^="/#"]').closest('li').removeClass('current-menu-item');
				$('a[href="/'+hash+'"]').closest('li').addClass('current-menu-item');

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
				scrollTop: $(hash).offset().top
				}, 900, function() {
					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
				return false;
			} // End if
		});

		// if we have anchor on the url (calling from other page)
		if(window.location.hash){
			$('a[href^="/#"]').closest('li').removeClass('current-menu-item.active');
			$('a[href="/'+window.location.hash+'"]').closest('li').addClass('current-menu-item');
			// smooth scroll to the anchor id
			$('html,body').animate({
				scrollTop:$(window.location.hash).offset().top + 'px'
			},1000,'swing');
		}
	});
	
})(jQuery, this);
