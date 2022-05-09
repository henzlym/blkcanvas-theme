const variations = [
    {
        blockName: 'core/columns',
        name: 'columnsmargincontrols',
        attributes: {},
        title: 'Columns: margin controls',
        supports:{
            blockGap: true,
			margin: [ "top", "bottom" ],
			padding: true,
			__experimentalDefaultControls: {
				padding: true
			}
        }
    }
]

variations.forEach(variation => {
    wp.blocks.registerBlockVariation(variation.blockName, {
        name: variation.name,
        title: variation.title,
        ...(typeof variation.description !== 'undefined') && { description: variation.description },
        ...(typeof variation.attributes !== 'undefined') && { attributes: variation.attributes },
        ...(typeof variation.scope !== 'undefined') && { scope: variation.scope },
        ...(typeof variation.supports !== 'undefined') && { supports: variation.supports },
        ...(typeof variation.isActive !== 'undefined') && { isActive: variation.isActive },
        ...(typeof variation.icon !== 'undefined') && { icon: variation.icon },
    });
});