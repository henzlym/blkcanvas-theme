(function($, w, d) {
	'use strict';
    // Universal functions
    return;
    var hamburger = document.querySelector( '.hamburger' );
    var navigation = document.querySelector( '.main-navigation' );
    var searchIcon = document.querySelector( '.blkcanvas-search-icon' );

    function toggleMenu() {
        navigation.classList.toggle( 'active' );
    }
    hamburger.addEventListener('click', toggleMenu);
    searchIcon.addEventListener('click', toggleMenu);
})(jQuery, window, document);