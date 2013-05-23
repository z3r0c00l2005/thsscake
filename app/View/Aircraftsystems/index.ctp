<div class="aircraftsystems index">
	<h2><?php echo __('Aircraftsystems'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('aircrafttype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('system_name'); ?></th>
			<th><?php echo $this->Paginator->sort('system_description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aircraftsystems as $aircraftsystem): ?>
	<tr>
		<td><?php echo h($aircraftsystem['Aircraftsystem']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aircraftsystem['Aircrafttype']['name'], array('controller' => 'aircrafttypes', 'action' => 'view', $aircraftsystem['Aircrafttype']['id'])); ?>
		</td>
		<td><?php echo h($aircraftsystem['Aircraftsystem']['system_name']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystem['Aircraftsystem']['system_description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aircraftsystem['Aircraftsystem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aircraftsystem['Aircraftsystem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aircraftsystem['Aircraftsystem']['id']), null, __('Are you sure you want to delete # %s?', $aircraftsystem['Aircraftsystem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Aircraftsystem'), array('action' => 'add',$aircraftsystem['Aircrafttype']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('List Aircrafttypes'), array('controller' => 'aircrafttypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircrafttype'), array('controller' => 'aircrafttypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aircraftsystemgraphics'), array('controller' => 'aircraftsystemgraphics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphic'), array('controller' => 'aircraftsystemgraphics', 'action' => 'add')); ?> </li>
	</ul>
</div>
