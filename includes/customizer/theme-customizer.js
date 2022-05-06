/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
 ( function( $ ) {

	function updateCustomizerSelectors(setting, key) {
		
		if (typeof setting.selectors == 'undefined' ) {
			return;
		}
		
		const selectors = Object.entries(setting.selectors);

		wp.customize( key, function( value ) {
			value.bind( function( newval ) {
				selectors.forEach(([k, v]) => {
					$( k ).css( v, newval );
				});
			} );
		} );

	}
    
	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '#site-title a' ).html( newval );
		} );
	} );
	
	//Update the site description in real time...
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	const keys = Object.keys(BLKCANVAS_CUSTOMIZER_SETTINGS);
	
	keys.forEach((key, index) => {
		const setting = BLKCANVAS_CUSTOMIZER_SETTINGS[key];
		updateCustomizerSelectors( setting , key );
	});
	

} )( jQuery );
