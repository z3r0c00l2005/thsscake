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
		<dd class="actions">
			<?php echo h($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_status']); ?>
			<?php echo $this->AclHtml->link(__('Development Complete'), array('controller' => 'aircraftsystemgraphics', 'action' => 'devcomplete', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?>		
			&nbsp;
		</dd>
		<dt><?php echo __('On Hold'); ?></dt>
		<dd class="actions">
			<?php if($aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_on_hold']) echo $this->Html->image('completed.png', array('alt' => 'yes', 'border' => '0')); else echo $this->Html->image('not_started.png', array('alt' => 'no', 'border' => '0')); ?>
			<?php 
			if ( !$aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_on_hold'] ) {
				echo $this->AclHtml->link(__('Place On Hold'), array('controller' => 'aircraftsystemgraphics', 'action' => 'onhold', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'], 'tohold')); 
			} else if ( $aircraftsystemgraphic['Aircraftsystemgraphic']['graphic_on_hold'] ) { 
			echo $this->AclHtml->link(__('Make Active'), array('controller' => 'aircraftsystemgraphics', 'action' => 'onhold', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'], 'fromhold')); 
			};
			?>		
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
				<?php echo $this->AclHtml->link(__('Download', true), array('controller' => 'uploads','action' => 'download', $upload['id'])); ?>
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
		<li><?php echo $this->AclHtml->link(__('Add Attachment'), array('controller' => 'uploads','action' => 'add', "Aircraftsystemgraphics", $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?></li>
		<li><?php echo $this->AclHtml->link(__('Add Work Done'), array('controller' => 'Aircraftsystemgraphicbookings', 'action' => 'add', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?> </li>
		<li><?php echo $this->AclHtml->link(__('Add Comment'), array('controller' => 'aircraftsystemgraphicscomments', 'action' => 'add', $aircraftsystemgraphic['Aircraftsystemgraphic']['id'], 'Development')); ?> </li>
		<li><?php echo '<br>'; ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>

<div class="related">
	<?php if (!empty($aircraftsystemgraphic['Aircraftsystemgraphicsbooking'])): ?>
	<h3><?php echo __('Work Done'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Work Done'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Hours Expended'); ?></th>		
		<th><?php echo __('Date Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aircraftsystemgraphic['Aircraftsystemgraphicsbooking'] as $aircraftsystemgraphicbooking): ?>
		<tr>
			<td><?php echo $aircraftsystemgraphicbooking['work_carried_out']; ?></td>
			<td><?php echo $aircraftsystemgraphicbooking['created_by']; ?></td>
			<td><?php echo $aircraftsystemgraphicbooking['modified_by']; ?></td>
			<td><?php echo $aircraftsystemgraphicbooking['hours_expended']; ?></td>
			<td><?php echo $aircraftsystemgraphicbooking['modified']; ?></td>
			<td class="actions">
				<?php echo $this->AclHtml->link(__('Edit'), array('controller' => 'Aircraftsystemgraphicbookings', 'action' => 'edit', $aircraftsystemgraphicbooking['id'], $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?>
		
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
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
		<th><?php echo __('Source'); ?></th>
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
			<td><?php echo $aircraftsystemgraphiccomment['comment_source']; ?></td>
			<td class="actions">
				<?php echo $this->AclHtml->link(__('Edit'), array('controller' => 'aircraftsystemgraphicscomments', 'action' => 'edit', $aircraftsystemgraphiccomment['id'], $aircraftsystemgraphic['Aircraftsystemgraphic']['id'])); ?>
		
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	
</div>
