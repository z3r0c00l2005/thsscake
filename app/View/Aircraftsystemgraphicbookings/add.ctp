<div class="aircraftsystemgraphicbookings form">
<?php echo $this->Form->create('Aircraftsystemgraphicbooking'); ?>
	<fieldset>
		<legend><?php echo __('Add Work Done'); ?></legend>
	<?php
		echo $this->Form->input('work_carried_out');
		//echo $this->Form->input('author');
		echo $this->Form->input('hours_expended');
	?>
	</fieldset>
<div class="submit">
		<?php echo $this->Form->submit(__('Submit', true), array('name' => 'submit', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'div' => false, 'formnovalidate' => true)); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>