<div class="text_radio_button_control">
    <?php if( !empty( $this->label ) ) : ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <?php endif; ?>
    <?php if( !empty( $this->description ) ) : ?>
        <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
    <?php endif; ?>
    <div class="radio-toolbar">
        <?php foreach ($this->choices as $key => $choice) : ?>
            <div class="radio-button_contaier">
                <input 
                    type="radio" 
                    id="<?php echo esc_attr( $key ); ?>" 
                    name="<?php echo esc_attr( $this->id ); ?>" 
                    value="<?php echo esc_attr( $key ); ?>"
                    <?php $this->link(); ?>
                    <?php checked( esc_attr( $key ), $this->value() ); ?>
                >
                <label for="<?php echo esc_attr( $key ); ?>"><?php echo $choice; ?></label>
            </div>
        <?php endforeach; ?>
    </div>
</div>
