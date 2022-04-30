<div class="radio-toolbar">
    <?php foreach ($this->choices as $key => $choice) : ?>
        <input type="radio" id="<?php echo $key; ?>" name="<?php echo $this->id; ?>" value="<?php echo $key; ?>">
        <label for="<?php echo $key; ?>"><?php echo $choice; ?></label>
    <?php endforeach; ?>
</div>