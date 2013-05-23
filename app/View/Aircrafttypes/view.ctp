<div class="aircrafttypes view">
<h2><?php  echo __('Aircraft Type'); ?></h2>
	<dl>
		
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($aircrafttype['Aircrafttype']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($aircrafttype['Aircrafttype']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->AclHtml->link(__('Show All Aircraft Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->AclHtml->link(__('Edit Aircraft Type'), array('action' => 'edit', $aircrafttype['Aircrafttype']['id'])); ?> </li>
		<li><?php echo $this->AclHtml->link(__('New System'), array('controller' => 'aircraftsystems', 'action' => 'add',$aircrafttype['Aircrafttype']['id'])); ?> </li>
		<li><?php echo '<br>'; ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($aircrafttype['Aircraftsystem'])): ?>
	<h3><?php echo __('Systems'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Workshare'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aircrafttype['Aircraftsystem'] as $aircraftsystem): ?>
		<tr>
			<td><?php echo $aircraftsystem['system_name']; ?></td>
			<td><?php echo $aircraftsystem['system_description']; ?></td>
			<td><?php echo $aircraftsystem['system_workshare']; ?></td>
			<td><?php echo $aircraftsystem['system_status']; ?></td>
			<td class="actions">
				<?php echo $this->AclHtml->link(__('View'), array('controller' => 'aircraftsystems', 'action' => 'view', $aircraftsystem['id'])); ?>
				<?php echo $this->AclHtml->link(__('Edit'), array('controller' => 'aircraftsystems', 'action' => 'edit', $aircraftsystem['id'],$aircrafttype['Aircrafttype']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
