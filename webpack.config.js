/**
 * External Dependencies
 */
 const path = require( 'path' );

/**
 * WordPress Dependencies
 */
const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');

module.exports = {
    ...defaultConfig,
    ...{
        // Add any overrides to the default here.
        entry:{
            ...defaultConfig.entry,
            'search-select': path.resolve( 'includes', 'customizer', 'fonts', 'js', 'scripts.js' ),
            'alignment': path.resolve( 'includes', 'customizer', 'alignment', 'index.js' ),
            'variations': path.resolve( 'includes', 'editor', 'src', 'index.js' )
        },
    }
}