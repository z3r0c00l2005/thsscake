<div class="aircrafttypes index">
	<h2><?php echo __('Aircraft Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aircrafttypes as $aircrafttype): ?>
	<tr>
		<td><?php echo h($aircrafttype['Aircrafttype']['name']); ?>&nbsp;</td>
		<td><?php echo h($aircrafttype['Aircrafttype']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->AclHtml->link(__('View'), array('action' => 'view', $aircrafttype['Aircrafttype']['id'])); ?>
			<?php echo $this->AclHtml->link(__('Edit'), array('action' => 'edit', $aircrafttype['Aircrafttype']['id'])); ?>
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
	<ul>
		<li><?php echo $this->AclHtml->link(__('New Aircraft Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->AclHtml->link(__('User Actions'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
