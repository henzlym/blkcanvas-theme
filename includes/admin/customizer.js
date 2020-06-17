
/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

    console.log(themeCustomizer.settings);
    
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

    Object.entries(themeCustomizer.settings).map(([key,value])=>{

        let selector = Object.keys(value.selectors)[0]
        let style = Object.values(value.selectors)[0]


		wp.customize(`${value.name}`, function( value ) {
			value.bind( function( newval ) {
				$(`${selector}`).css(`${style}`, newval );
			} );
		} );
    })
    
} )( jQuery );