<div class="aircraftsystemgraphicbookings view">
<h2><?php  echo __('Aircraftsystemgraphicbooking'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aircraftsystemgraphic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aircraftsystemgraphicbooking['Aircraftsystemgraphic']['id'], array('controller' => 'aircraftsystemgraphics', 'action' => 'view', $aircraftsystemgraphicbooking['Aircraftsystemgraphic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Carried Out'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['work_carried_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hours Expended'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['hours_expended']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aircraftsystemgraphicbooking'), array('action' => 'edit', $aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aircraftsystemgraphicbooking'), array('action' => 'delete', $aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id']), null, __('Are you sure you want to delete # %s?', $aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aircraftsystemgraphicbookings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphicbooking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aircraftsystemgraphics'), array('controller' => 'aircraftsystemgraphics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphic'), array('controller' => 'aircraftsystemgraphics', 'action' => 'add')); ?> </li>
	</ul>
</div>
