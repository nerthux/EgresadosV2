<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
	<div class="options form large-9 medium-8 columns content">
	    <?= $this->Form->create($option) ?>
	    <fieldset>
	        <legend><?= __('Add Option') ?></legend>
	        	<div class="col-sm-12 col-md-6"><?=  $this->Form->control('name'); ?></div>
	        	<div class="col-sm-12  col-md-6"><?=  $this->Form->control('description'); ?></div>
		<div id="opt-container" style="margin-top: 2em">
			<div class="col-sm-12  col-md-6">
				<div class="form-group text">
					<label class="control-label" for="option-text">Text</label>
					<input type="text" name="text[]" id="option-text" class="form-control"/>
				</div>
			</div>
			<div class="col-sm-12  col-md-6">
				<div class="form-group text">
					<label class="control-label" for="option-val">Val</label>
					<input type="text" name="val[]" id="option-val" class="form-control"/>
				</div>	
			</div>
		</div>
		<button type="button" id="add-opt" class="btn btn-info pull-right">Add option</button>
	      </div> 
	    </fieldset>
	    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>



<script>
$(document).ready(function(){
	$('#add-opt').click(function(){
		$('#opt-container').append('<div class="col-sm-12  col-md-6"><div class="form-group text"><label class="control-label" for="option-text">Text</label><input type="text" name="text[]" id="option-text" class="form-control"/></div></div><div class="col-sm-12  col-md-6"><div class="form-group text"><label class="control-label" for="option-val">Val</label><input type="text" name="val[]" id="option-val" class="form-control"/></div></div>');
	});

});
</script>
