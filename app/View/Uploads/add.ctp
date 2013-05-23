<div class="uploads form">
<?php echo $this->Form->create('Upload', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Upload'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('file', array('type' => 'file'));
	?>
	</fieldset>
<div class="submit">
		<?php echo $this->Form->submit(__('Submit', true), array('name' => 'submit', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'div' => false, 'formnovalidate' => true)); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
</div>
