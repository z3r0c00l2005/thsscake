<div class="aircraftsystemcomments form">
<?php echo $this->Form->create('Aircraftsystemcomment'); ?>
	<fieldset>
		<legend><?php echo __('Add System Comment'); ?></legend>
	<?php
		//echo $this->Form->input('aircraftsystem_id');
		echo $this->Form->input('comment');
		//echo $this->Form->input('author');
		//echo $this->Form->input('commentdate');
	?>
	</fieldset>
<div class="submit">
		<?php echo $this->Form->submit(__('Submit', true), array('name' => 'submit', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'div' => false, 'formnovalidate' => true)); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>

