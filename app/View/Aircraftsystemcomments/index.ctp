<div class="aircraftsystemcomments index">
	<h2><?php echo __('Aircraftsystemcomments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('aircraftsystem_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('author'); ?></th>
			<th><?php echo $this->Paginator->sort('commentdate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aircraftsystemcomments as $aircraftsystemcomment): ?>
	<tr>
		<td><?php echo h($aircraftsystemcomment['Aircraftsystemcomment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aircraftsystemcomment['Aircraftsystem']['id'], array('controller' => 'aircraftsystems', 'action' => 'view', $aircraftsystemcomment['Aircraftsystem']['id'])); ?>
		</td>
		<td><?php echo h($aircraftsystemcomment['Aircraftsystemcomment']['comment']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemcomment['Aircraftsystemcomment']['author']); ?>&nbsp;</td>
		<td><?php echo h($aircraftsystemcomment['Aircraftsystemcomment']['commentdate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aircraftsystemcomment['Aircraftsystemcomment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aircraftsystemcomment['Aircraftsystemcomment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aircraftsystemcomment['Aircraftsystemcomment']['id']), null, __('Are you sure you want to delete # %s?', $aircraftsystemcomment['Aircraftsystemcomment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Aircraftsystemcomment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Aircraftsystems'), array('controller' => 'aircraftsystems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystem'), array('controller' => 'aircraftsystems', 'action' => 'add')); ?> </li>
	</ul>
</div>
