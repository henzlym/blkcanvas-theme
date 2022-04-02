<?php
if (!defined('WPINC')) {
    die;
}

$fonts = $this->get_fonts();
$system_fonts = $this->get_system_fonts();
// error_log(print_r($fonts,true));

?>
<div class="fonts-search-select-custom-control">
    <?php if (!empty($this->label)) : ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
    <?php endif; ?>
    <?php if (!empty($this->description)) : ?>
        <span class="customize-control-description"><?php echo wp_kses_post($this->description); ?></span>
    <?php endif; ?>
    <?php if (is_array($fonts) || is_array($system_fonts)) : ?>
        <label for="<?php echo $this->id; ?>">Font Family</label>
        <select <?php $this->link(); ?> class="customize-control-select2">
            <option value="">Default Font</option>
            <?php if (is_array($system_fonts)) : ?>
                <optgroup label="System Fonts">
                    <?php foreach ($system_fonts['items'] as $key => $system_font) : ?>
                        <option value="<?php echo $system_font['stack']; ?>"><?php echo $system_font['label']; ?></option>
                    <?php endforeach; ?> 
                </optgroup>
            <?php endif; ?>
            <?php if (is_array($fonts)) : ?>
                <optgroup label="Google Fonts">
                    <?php foreach ($fonts['items'] as $key => $font) : ?>
                        <option value="<?php echo $font['family']; ?>|<?php echo $font['category']; ?>|<?php echo implode(';', $font['variants'] ); ?>"><?php echo $font['family']; ?></option>
                    <?php endforeach; ?>
                </optgroup>
            <?php endif; ?>
        </select>
    <?php endif; ?>
    
</div>