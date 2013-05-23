<div class="aircraftsystemgraphicbookings form">
<?php echo $this->Form->create('Aircraftsystemgraphicbooking'); ?>
	<fieldset>
		<legend><?php echo __('Edit Work Done'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aircraftsystemgraphicbooking.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Aircraftsystemgraphicbooking.id'))); ?></li>
	</ul>
</div>
