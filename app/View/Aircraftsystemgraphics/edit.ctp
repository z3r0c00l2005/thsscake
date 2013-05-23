<div class="aircraftsystemgraphics form">
<?php echo $this->Form->create('Aircraftsystemgraphic'); ?>
	<fieldset>
		<legend><?php echo __('Edit System Graphic'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('graphic_media_label');
		echo $this->Form->input('graphic_title');
		echo $this->Form->input('graphic_description');
		$graphictype = array('2D'=>'2D','3D'=>'3D','2D&3D'=>'2D&3D','Other'=>'Other');
		echo $this->Form->input('graphic_type',array('options' => $graphictype));
		echo $this->Form->input('graphic_adj_estimated_hours');
		$graphicstatus = array('Not Started'=>'Not Started','In Progress'=>'In Progress','Completed'=>'Development Completed');
		echo $this->Form->input('graphic_status',array('options' => $graphicstatus));
		echo $this->Form->input('graphic_on_hold');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aircraftsystemgraphic.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Aircraftsystemgraphic.graphic_title'))); ?></li>
	</ul>
</div>
