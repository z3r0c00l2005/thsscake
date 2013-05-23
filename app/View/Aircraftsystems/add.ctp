<div class="aircraftsystems form">
<?php echo $this->Form->create('Aircraftsystem'); ?>
	<fieldset>
		<legend><?php echo __('Add Aircraft System'); ?></legend>
	<?php
		echo $this->Form->input('system_name', array('label' => 'System Name'));
		echo $this->Form->input('system_description', array('label' => 'Description'));
		$workshares = array('UK'=>'UK','Italy'=>'Italy');
		echo $this->Form->input('system_workshare',array('options' => $workshares));
	?>
	</fieldset>
<div class="submit">
		<?php echo $this->Form->submit(__('Submit', true), array('name' => 'submit', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'div' => false, 'formnovalidate' => true)); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>

