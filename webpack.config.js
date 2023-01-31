/**
 * External Dependencies
 */
const path = require( 'path' );

/**
 * WordPress Dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );

module.exports = {
	...defaultConfig,
	...{
		// Add any overrides to the default here.
		entry: {
			...defaultConfig.entry,
			customizer: path.resolve( 'src', 'js', 'customizer', 'index.js' ),
			editor: path.resolve( 'src', 'js', 'editor', 'index.js' ),
		},
	},
};
