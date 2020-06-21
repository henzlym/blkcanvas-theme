<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $blkcanvas_account_fields;

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * Assets enqueued:
 * 1. blocks.style.build.css - Frontend + Backend.
 * 2. blocks.build.js - Backend.
 * 3. blocks.editor.build.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function blkcanvas_woocommerce_registration_form_block_assets() { // phpcs:ignore
	// Register block styles for both frontend + backend.
	wp_register_style(
		'blkcanvas_woocommerce_registration_form-style-css', // Handle.
		BLKCANVAS_PLUGINS_URI . 'blkcanvas-woocommerce-registration-form/dist/blocks.style.build.css', // Block style CSS.
		is_admin() ? array( 'wp-editor' ) : null, // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);

	// Register block editor script for backend.
	wp_register_script(
		'blkcanvas_woocommerce_registration_form-block-js', // Handle.
		BLKCANVAS_PLUGINS_URI . 'blkcanvas-woocommerce-registration-form/dist/blocks.build.js', // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'blkcanvas_woocommerce_registration_form-block-editor-css', // Handle.
		BLKCANVAS_PLUGINS_URI . 'blkcanvas-woocommerce-registration-form/dist/blocks.editor.build.css', // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	wp_localize_script(
		'blkcanvas_woocommerce_registration_form-block-js',
		'blkCanvas', // Array containing dynamic data for a JS Global.
		[
			'pluginDirPath' => BLKCANVAS_PLUGINS_ROOT . 'blkcanvas-woocommerce-registration-form/src/init.php',
			'pluginDirUrl'  => BLKCANVAS_PLUGINS_URI . 'blkcanvas-woocommerce-registration-form/src',
			'showPasswordField' => ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) ? true : false,
			'showUsernameField' => ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) ? true : false,
			// Add more data here that you want to access from `cgbGlobal` object.
		]
	);

	/**
	 * Register Gutenberg block on server-side.
	 *
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are
	 * enqueued when the editor loads.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
	 * @since 1.16.0
	 */
	register_block_type(
		'blkcanvas/woocommerce-registration-form', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'blkcanvas_woocommerce_registration_form-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'blkcanvas_woocommerce_registration_form-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'blkcanvas_woocommerce_registration_form-block-editor-css',
			// Render callback function
			'render_callback' => 'blkcanvas_woocommerce_registration_form_render'
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'blkcanvas_woocommerce_registration_form_block_assets' );

function blkcanvas_woocommerce_registration_form_render( $attributes )
{

	if ( is_admin() ) return;
	if ( is_user_logged_in() ) return;

	ob_start();

	global $woo_field;
	$woo_field = array();
	foreach ($attributes['fields'] as $key => $attribute) {
		if( $attribute['is_selected'] == true ){

			$options = null;
			if( isset( $attribute['options'] ) ){
				$options = array();
				foreach ( $attribute['options'] as $key => $option ) {
					$options[$option['value']] = $option['label'];
				}
			}
			$woo_field['blkcanvas_woo['.$attribute['name'].']'] = array(
				'type' => $attribute['input'],
				'label' => $attribute['label'],
				'options' => $options !== null ? $options : array(),
				'placeholder' => '',
				'required' => false,
			);
		}
	}
	
	add_filter( 'blkcanvas_account_fields', function( $fields ){
		global $woo_field;
		return $woo_field;
	});
	
	require_once BLKCANVAS_PLUGINS_ROOT . 'blkcanvas-woocommerce-registration-form/src/form.php';
	return ob_get_clean();
}

/**
 * Get additional account fields.
 *
 * @see https://iconicwp.com/blog/the-ultimate-guide-to-adding-custom-woocommerce-user-account-fields/
 *
 * @return array
 */
function blkcanvas_get_account_fields( $fields = array() ) {

    return apply_filters( 'blkcanvas_account_fields', $fields );

}
/**
 * Add fields to registration form and account area.
 *
 * @see https://iconicwp.com/blog/the-ultimate-guide-to-adding-custom-woocommerce-user-account-fields/
 */

add_action( 'woocommerce_register_form_start', 'blkcanvas_print_user_frontend_fields', 99 ); // register form
function blkcanvas_print_user_frontend_fields() {


    $fields = blkcanvas_get_account_fields();

	if( is_array( $fields ) && count( $fields ) > 0 ){

		foreach ( $fields as $key => $field_args ) {

			woocommerce_form_field( $key, $field_args );
	
		}
		
	}

}

/**

 * Save registration fields.

 *

 * @param int $customer_id

 *

 * @see https://iconicwp.com/blog/the-ultimate-guide-to-adding-custom-woocommerce-user-account-fields/

 */


function blkcanvas_woo_save_registration_fields( $customer_id ) {


    $fields = blkcanvas_get_account_fields();


    $sanitized_data = array();

 
	if( ! isset( $_POST['blkcanvas_woo_save_registration_fields_nonce'] ) 
	|| ! wp_verify_nonce( $_POST['blkcanvas_woo_save_registration_fields_nonce'], 'blkcanvas_woo_save_registration_fields' )
	|| ! isset( $_POST['blkcanvas_woo'] ) ){
		return;
	}

	
	$fields = $_POST['blkcanvas_woo'];

	
    foreach ( $fields as $key => $value ) {


        // if ( ! blkcanvas_is_field_visible( $field_args ) ) {


        //     continue;


        // }

 


        // $sanitize = isset( $field_args['sanitize'] ) ? $field_args['sanitize'] : 'wc_clean';


        // $value    = call_user_func( $sanitize, $_POST[ $key ] );

 


        // if ( blkcanvas_is_userdata( $key ) ) {


        //     $sanitized_data[ $key ] = $value;


        //     continue;


        // }        

 
        update_user_meta( $customer_id, $key, $value );


    }

 


    if ( ! empty( $sanitized_data ) ) {


        $sanitized_data['ID'] = $customer_id;


        wp_update_user( $sanitized_data );


    }

}

add_action( 'woocommerce_created_customer', 'blkcanvas_woo_save_registration_fields' ); // register/checkout


add_action( 'personal_options_update', 'blkcanvas_woo_save_registration_fields' ); // edit own account admin


add_action( 'edit_user_profile_update', 'blkcanvas_woo_save_registration_fields' ); // edit other account admin


add_action( 'woocommerce_save_account_details', 'blkcanvas_woo_save_registration_fields' ); // edit WC account
