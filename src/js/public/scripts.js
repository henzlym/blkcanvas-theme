( function ( w, d ) {
	'use strict';
	// Universal functions

	let hamburger = document.querySelector( '.hamburger-menu' );
	let navigation = document.querySelector( '.site-navigation' );
	let searchIcon = document.querySelector( 'header .search-trigger' );
	let searchForm = document.querySelector( 'header form.search' );
    let searchFormClose = document.querySelector( 'header form.search .search-close' );
    
	function toggleMenu() {
		document.body.classList.toggle( 'mobile-nav-open' );
		navigation.classList.toggle( 'active' );
        hamburger.classList.toggle( 'active' );
		if ( navigation.classList.contains( 'active' ) ) {
			let header = document.querySelector( 'header.header' );
			let width = header.offsetWidth;
			let height = header.offsetHeight;
			if (
				blkcanvasTheme.isAdminBarShowing
			) {
				let adminBar = document.querySelector( '#wpadminbar' );
				height = height + adminBar.offsetHeight;
			}

			navigation.style.top = height + 'px';
		} else {
			navigation.style.top = '0px';
		}
	}
	function toggleSearch( e ) {
		e.preventDefault();
		searchForm.classList.toggle( 'open' );
		if ( document.body.classList.contains( 'mobile-nav-open' ) ) {
		}
	}
	hamburger.addEventListener( 'click', toggleMenu );
	searchIcon.addEventListener( 'click', toggleSearch );
    searchFormClose.addEventListener( 'click', toggleSearch );
    
} )( window, document );
