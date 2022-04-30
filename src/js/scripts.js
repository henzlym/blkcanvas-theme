(function($, w, d) {
	'use strict';
    // Universal functions

    var hamburger = document.querySelector( '.hamburger-menu' );
    var navigation = document.querySelector( '.site-navigation' );
    var searchIcon = document.querySelector( '.blkcanvas-search-icon' );

    function toggleMenu() {
        navigation.classList.toggle( 'active' );
    }
    hamburger.addEventListener('click', toggleMenu);
    // searchIcon.addEventListener('click', toggleMenu);
})(jQuery, window, document);