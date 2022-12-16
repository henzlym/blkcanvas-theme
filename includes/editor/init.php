<?php
/**
 * @see https://gist.github.com/gziolo/a947dc52eb2604c77a0a5b0797b2e781
 * @see https://github.com/WordPress/WordPress/blob/c6dbcf85766063b20aeb23ca207cc476818cdda2/wp-includes/block-editor.php#L504
 */
function bca_editor_settings_all($editor_settings, $block_editor_context)
{
	if ( empty( $block_editor_context->post ) ) return $editor_settings;

	$editor_settings['__experimentalFeatures']['appearanceTools'] = true;
	$editor_settings['__experimentalFeatures']['spacing']['blockGap'] = true;
	$editor_settings['__experimentalFeatures']['spacing']['padding'] = true;
	$editor_settings['__experimentalFeatures']['spacing']['margin'] = true;
	// error_log(print_r($editor_settings['__experimentalFeatures'],true));

	return $editor_settings;
}
add_filter( 'block_editor_settings_all', 'bca_editor_settings_all', 10, 2 );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function bca_enqueue_editor_scripts() {
	$asset = include( get_template_directory() . '/build/variations.asset.php' );
	wp_enqueue_script('blkcanvas-block-variations', get_template_directory_uri() . '/build/variations.js', array(), $asset['version'], true );
}
add_action( 'admin_enqueue_scripts', 'bca_enqueue_editor_scripts' );