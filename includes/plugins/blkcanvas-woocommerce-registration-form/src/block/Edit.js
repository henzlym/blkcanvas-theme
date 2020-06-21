import Inspector from './Inspector'

const { Component } = wp.element
const { CheckboxControl, RadioControl, SelectControl, TextControl, ToggleControl, RangeControl } = wp.components
const { apiFetch } = wp;
const { RichText } = wp.blockEditor;

export default class Edit extends Component{

    constructor() {
        super(...arguments);
        this.state = {
            fields:[
                {
                    is_selected:false,
                    name:'billing_first_name',
                    label:'First name',
                    value:'',
                    controlType:TextControl,
                    input:'text',
                },
                {
                    is_selected:false,
                    name:'billing_last_name',
                    label:'Last name',
                    value:'',
                    controlType:TextControl,
                    input:'text',
                },
                {
                    is_selected:false,
                    name:'billing_phone',
                    label:'Phone',
                    value:'',
                    controlType:TextControl,
                    input:'text',
                }
            ]
        }
    }

    componentDidMount(){
        let { fields } = this.state;
        fields.map( ( option, i ) => {

            this.props.attributes.fields.map( ( field, i ) => {
                if( option.name == field.name ){
                    option.is_selected = field.is_selected
                }
            });
            
        });

        this.setState({ fields })

    }

    updateSelectedFields = ( option ) => {
        let selectOptions = [];
        let { fields } = this.state;
        fields.map( ( field, i ) => {
            if(  option.name == field.name ){

                field.is_selected = option.is_selected
            }

            if( field.is_selected ){
                selectOptions.push(field)
            }
        });
        this.props.setAttributes({ fields:selectOptions })
        this.setState({ fields })
    }

    renderFields = () => {
        let { fields } = this.state;
        return fields.map( ( option, i ) => {
            let show = true
            this.props.attributes.fields.map( ( field, i ) => {
                if( option.name == field.name ){
                    option.is_selected = field.is_selected
                }
            });
            
            if (option.is_selected == false) {
                return;
            }
            
            let OptionComponent = this.state.fields[i].controlType;
            return(
                <OptionComponent 
                    key={i} 
                    name={option.name}
                    label={option.label}
                    value={option.value}
                    selected={option.selected}
                    options={option.options}
                    disabled/>
            )
        });
    }

    render(){

        const { attributes } = this.props;


        return (
            <div className={'className'}>
                <Inspector { ...this.props.attributes } fields={this.state.fields} updateSelectedFields={ this.updateSelectedFields } />
                <div className="">
                    {this.renderFields()}

                    {blkCanvas.showUsernameField && (
                        <TextControl
                            label="Username *"
                            value={ '' }
                            disabled
                        />
                    )}

                    <TextControl
                        label="Email address *"
                        value={ '' }
                        required
                        disabled
                    />

                    {blkCanvas.showPasswordField && (
                        <TextControl
                            label="Password *"
                            value={ '' }
                            disabled
                        />
                    )}

                    <p className="woocommerce-form-row form-row">
                        <button type="submit" className="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="">Register</button>
                    </p>
                </div>
            </div>
        )
    }
}