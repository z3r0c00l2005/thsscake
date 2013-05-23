<div class="aircraftsystemcomments form">
<?php echo $this->Form->create('Aircraftsystemcomment'); ?>
	<fieldset>
		<legend><?php echo __('Edit System Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');		
	//	echo $this->Form->input('aircraftsystem_id');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aircraftsystemcomment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Aircraftsystemcomment.id'))); ?></li>
	</ul>
</div>
