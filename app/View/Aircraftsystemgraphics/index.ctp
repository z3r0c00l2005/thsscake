<div class="aircraftsystemgraphics index">
	<h2><?php echo __('Aircraftsystemgraphics'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('aircraftsystem_id'); ?></th>
			<th><?php echo $this->Paginator->sort('graphic_title'); ?></th>
			<th><?php echo $this->Paginator->sort('graphic_description'); ?></th>
			<th><?php echo $this->Paginator->sort('graphic_type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aircraftsystemgraphics as $aircraftsystemgraphic): ?>
	<tr>
		<td><?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aircraftsystemgraphic['Aircraftsystem']['id'], array('controller' => 'aircraftsystems', 'action' => 'view', $aircraftsystemgraphic['Aircraftsystem']['id'])); ?>
		</td>
		<td><?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_title']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_description']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aircraftsystemgraphic['Aircraftsystemgraphic']['id']), null, __('Are you sure you want to delete # %s?', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphic'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Aircraftsystems'), array('controller' => 'aircraftsystems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystem'), array('controller' => 'aircraftsystems', 'action' => 'add')); ?> </li>
	</ul>
</div>
