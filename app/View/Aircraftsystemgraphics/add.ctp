<div class="aircraftsystemgraphics form">
<?php echo $this->Form->create('Aircraftsystemgraphic'); ?>
	<fieldset>
		<legend><?php echo __('Add System Graphic'); ?></legend>
	<?php
		echo $this->Form->input('graphic_media_label');
		echo $this->Form->input('graphic_title');
		echo $this->Form->input('graphic_description');
		$graphictype = array('2D'=>'2D','3D'=>'3D','2D&3D'=>'2D&3D','Other'=>'Other');
		echo $this->Form->input('graphic_type',array('options' => $graphictype));
		echo $this->Form->input('graphic_estimated_hours');
	?>
	</fieldset>
<div class="submit">
		<?php echo $this->Form->submit(__('Submit', true), array('name' => 'submit', 'div' => false)); ?>
		<?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'div' => false, 'formnovalidate' => true)); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>

