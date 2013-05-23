<div class="aircraftsystemgraphicscomments form">
<?php echo $this->Form->create('Aircraftsystemgraphicscomment'); ?>
	<fieldset>
		<legend><?php echo __('Add Graphic Comment'); ?></legend>
	<?php
	//	echo $this->Form->input('aircraftsystemgraphics_id');
		echo $this->Form->input('comment');
	//	echo $this->Form->input('author');
	?>
	</fieldset>
<div class="submit">
		<?php echo $this->Form->submit(__('Submit', true), array('name' => 'submit', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'div' => false, 'formnovalidate' => true)); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
