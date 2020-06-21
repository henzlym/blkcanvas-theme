const { __ } = wp.i18n
const { Component } = wp.element
const { InspectorControls, PanelColorSettings } = wp.blockEditor
const { CheckboxControl, Panel,PanelBody,PanelRow, RadioControl, SelectControl, TextControl, ToggleControl, RangeControl, FormTokenField } = wp.components
const { apiFetch } = wp;

export default class Inspector extends Component {

    constructor() {
        super(...arguments);
        this.state = {
			fields:this.props.fields
        }
    }
  
    renderOptions = () => {
        const { updateSelectedFields } = this.props;
        let { fields } = this.state;

        return fields.map( ( option, i ) => {
            let show = true
            this.props.fields.map( ( field, i ) => {
                if( option.name == field.name ){
                    option.is_selected = field.is_selected
                }
            });

            return(
                <CheckboxControl
                    key={i}
                    label={ option.label }
                    checked={ option.is_selected }
                    onChange={ ( checked ) => {
                        console.log(option);
                        option.is_selected = !option.is_selected

                        updateSelectedFields(option)
                    } }
                />
            )
        });
    }

    render() {
        
        return (
            <InspectorControls>
                <PanelBody title="Form Fields" initialOpen={ true }>
                    {this.renderOptions()}
                </PanelBody>
            </InspectorControls>
        )
    }

}
