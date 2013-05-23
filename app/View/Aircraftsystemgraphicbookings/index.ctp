<div class="aircraftsystemgraphicbookings index">
	<h2><?php echo __('Aircraftsystemgraphicbookings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('aircraftsystemgraphic_id'); ?></th>
			<th><?php echo $this->Paginator->sort('work_carried_out'); ?></th>
			<th><?php echo $this->Paginator->sort('author'); ?></th>
			<th><?php echo $this->Paginator->sort('hours_expended'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aircraftsystemgraphicbookings as $aircraftsystemgraphicbooking): ?>
	<tr>
		<td><?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aircraftsystemgraphicbooking['Aircraftsystemgraphic']['id'], array('controller' => 'aircraftsystemgraphics', 'action' => 'view', $aircraftsystemgraphicbooking['Aircraftsystemgraphic']['id'])); ?>
		</td>
		<td><?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['work_carried_out']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['author']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['hours_expended']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['created']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id']), null, __('Are you sure you want to delete # %s?', $aircraftsystemgraphicbooking['Aircraftsystemgraphicbooking']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphicbooking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Aircraftsystemgraphics'), array('controller' => 'aircraftsystemgraphics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphic'), array('controller' => 'aircraftsystemgraphics', 'action' => 'add')); ?> </li>
	</ul>
</div>
