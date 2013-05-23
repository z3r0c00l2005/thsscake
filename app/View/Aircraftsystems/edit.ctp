<div class="aircraftsystems form">
<?php echo $this->Form->create('Aircraftsystem'); ?>
	<fieldset>
		<legend><?php echo __('Edit System'); ?></legend>
	<?php
		echo $this->Form->input('id');
	
		echo $this->Form->input('system_name');
		echo $this->Form->input('system_description');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aircraftsystem.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Aircraftsystem.system_name'))); ?></li>
	</ul>
</div>
