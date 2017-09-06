<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="options form large-9 medium-8 columns content">
    <?= $this->Form->create($option) ?>
    <fieldset>
        <legend><?= __('Add Option') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
	?>

	<div id="opt-container">
		<div class="form-group text">
			<label class="control-label" for="option-text">Text</label>
			<input type="text" name="text[]" id="option-text" class="form-control"/>
		</div>
		<div class="form-group text">
			<label class="control-label" for="option-val">Val</label>
			<input type="text" name="val[]" id="option-val" class="form-control"/>
		</div>	
	</div>
	<button type="button" id="add-opt" class="btn">Add option</button>
      </div> 
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<script>
$(document).ready(function(){
	$('#add-opt').click(function(){
		$('#opt-container').append('<div class="form-group text"><label class="control-label" for="option-text">Text</label><input type="text" name="text[]" id="option-text" class="form-control"/></div><div class="form-group text"><label class="control-label" for="option-val">Val</label><input type="text" name="val[]" id="option-val" class="form-control"/></div>');
	});

});
</script>
