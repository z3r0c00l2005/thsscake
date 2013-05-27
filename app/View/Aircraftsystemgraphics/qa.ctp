<div class="aircraftsystemgraphics view">
<h2><?php  echo __('Graphic Details'); ?></h2>
	<dl>

		<dt><?php echo __('System'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aircraftsystemgraphic['Aircraftsystem']['system_name'].' - '.$aircraftsystemgraphic['Aircraftsystem']['system_description'], array('controller' => 'aircraftsystems', 'action' => 'view', $aircraftsystemgraphic['Aircraftsystem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media Label'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_media_label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estimated Hours'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_adj_estimated_hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_status']); ?>
			&nbsp;
		</dd>
		<?php if (!empty($aircraftsystemgraphic['uploads'])): ?>
		<dt><?php echo __('Attachments'); ?></dt>
		<dd>
		<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Title'); ?></th>
				<th><?php echo __('File Name'); ?></th>
				<th><?php echo __('Size'); ?></th>
				<th><?php echo __('Uploaded'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($aircraftsystemgraphic['uploads'] as $upload): ?>
			<tr>
				<td><?php echo h($upload['title']); ?>&nbsp;</td>
				<td><?php echo h($upload['filename']); ?>&nbsp;</td>
				<td><?php echo h(round($upload['filesize']/1024/1024,2)." Mb"); ?>&nbsp;</td>
				<td><?php echo h($upload['modified']); ?>&nbsp;</td>
				<td class="actions">
				<?php echo $this->Html->link(__('Download', true), array('controller' => 'uploads','action' => 'download', $upload['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		</dd>
		<?php endif; ?>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->AclHtml->link(__('List Graphics For System'), array('controller' => 'aircraftsystems', 'action' => 'view', $aircraftsystemgraphic['Aircraftsystem']['id'])); ?> </li>
		<li><?php echo $this->AclHtml->link(__('Add Comment'), array('controller' => 'aircraftsystemgraphicscomments', 'action' => 'add', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'], 'QA')); ?> </li>
		<li><?php echo '<br>'; ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>

<div class="related">
	<?php if (!empty($aircraftsystemgraphic['Aircraftsystemgraphicscomment'])): ?>
	<h3><?php echo __('Comments'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Date Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aircraftsystemgraphic['Aircraftsystemgraphicscomment'] as $aircraftsystemgraphiccomment): ?>
		<tr>
			<td><?php echo $aircraftsystemgraphiccomment['comment']; ?></td>
			<td><?php echo $aircraftsystemgraphiccomment['created_by']; ?></td>
			<td><?php echo $aircraftsystemgraphiccomment['modified_by']; ?></td>
			<td><?php echo $aircraftsystemgraphiccomment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->AclHtml->link(__('Edit'), array('controller' => 'aircraftsystemgraphicscomments', 'action' => 'edit', $aircraftsystemgraphiccomment['id'], $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?>
		
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	
</div>
