import { addFilter } from '@wordpress/hooks';
import { assign, merge } from 'lodash';

function filterCoverBlockAlignments( settings, name ) {
	if ( name === 'core/columns' ) {
		if ( typeof settings.supports == 'undefined' ) return settings;

		return assign( {}, settings, {
			supports: {
				...settings.supports,
				spacing: {
					...settings.supports.spacing,
					blockGap: true,
					margin: [ 'top', 'bottom', 'left', 'right' ],
				},
			},
		} );
	}
	return settings;
}

addFilter(
	'blocks.registerBlockType',
	'intro-to-filters/cover-block/alignment-settings',
	filterCoverBlockAlignments
);
