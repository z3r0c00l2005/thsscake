<div class="aircraftsystems view">
<h2><?php  echo __('System'); ?></h2>
	<dl>
		<dt><?php echo __('Aircraft Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aircraftsystem['Aircrafttype']['name'].' - '.$aircraftsystem['Aircrafttype']['description'], array('controller' => 'aircrafttypes', 'action' => 'view', $aircraftsystem['Aircrafttype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System'); ?></dt>
		<dd>
			<?php echo h($aircraftsystem['Aircraftsystem']['system_name'].' - '.$aircraftsystem['Aircraftsystem']['system_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php // echo $graphicstatus; ?>
			<?php echo '<b>In Progress: </b>'.$numbergraphicsinprogress.'   <b>On Hold: </b>'.$numbergraphicshold.'   <b>Completed: </b>'.$numbergraphicscompleted.'   <b>Total: </b>'.$numbergraphics; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hours'); ?></dt>
		<dd>
			<?php echo '<b>Estimated: </b>'.$total_est_hours[0]['total_sum'].'   <b>Adjusted: </b>'.$total_adj_hours[0]['total_sum'].'   <b>Completed: </b>'.' TO BE ADDED'; ?>
			&nbsp;
		</dd>
		
		<?php if (!empty($aircraftsystem['uploads'])): ?>
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
			<?php foreach ($aircraftsystem['uploads'] as $upload): ?>
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
		<li><?php echo $this->AclHtml->link(__('Show All Systems'), array('controller' => 'aircrafttypes', 'action' => 'view', $aircraftsystem['Aircrafttype']['id'])); ?> </li>
		<li><?php echo $this->AclHtml->link(__('Edit System'), array('action' => 'edit', $aircraftsystem['Aircraftsystem']['id'],$aircraftsystem['Aircrafttype']['id'])); ?> </li>
		<li><?php echo $this->AclHtml->link(__('Add Attachment'), array('controller' => 'uploads','action' => 'add', "Aircraftsystems", $aircraftsystem['Aircraftsystem']['id'])); ?></li>
		<li><?php echo $this->AclHtml->link(__('Add Graphic'), array('controller' => 'aircraftsystemgraphics', 'action' => 'add', $aircraftsystem['Aircraftsystem']['id'])); ?> </li>
		<li><?php echo $this->AclHtml->link(__('Add Comment'), array('controller' => 'aircraftsystemcomments', 'action' => 'add', $aircraftsystem['Aircraftsystem']['id'])); ?> </li>
		<li><?php echo '<br>'; ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($aircraftsystem['Aircraftsystemgraphic'])): ?>
	<h3><?php echo __('Graphics Under Development'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Media Label'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Estimated Hours'); ?></th>
		<th><?php echo __('Adjusted Hours'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('On Hold'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aircraftsystem['Aircraftsystemgraphic'] as $aircraftsystemgraphic): ?>
		<?php if ( $aircraftsystemgraphic['graphic_status'] == 'Not Started' || $aircraftsystemgraphic['graphic_status'] == 'In Progress' ){ ?>

		<tr>
			<td><?php echo $aircraftsystemgraphic['graphic_media_label']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_title']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_description']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_type']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_estimated_hours']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_adj_estimated_hours']; ?></td>
			
			<td><?php if($aircraftsystemgraphic['graphic_status'] == 'Not Started') echo $this->Html->image('not_started.png', array('alt' => 'not started', 'border' => '0')); 
			else if($aircraftsystemgraphic['graphic_status'] == 'In Progress') echo $this->Html->image('in_progress.png', array('alt' => 'in progress', 'border' => '0')); 
			else if($aircraftsystemgraphic['graphic_status'] == 'Completed') echo $this->Html->image('completed.png', array('alt' => 'completed', 'border' => '0'));?></td> 
			
			<td><?php if($aircraftsystemgraphic['graphic_on_hold']) echo $this->Html->image('on_hold.png', array('alt' => 'yes', 'border' => '0')); else echo ""; ?></td> 
			<td class="actions">
				<?php echo $this->AclHtml->link(__('View'), array('controller' => 'aircraftsystemgraphics', 'action' => 'view', $aircraftsystemgraphic['id'])); ?>
				<?php echo $this->AclHtml->link(__('Edit'), array('controller' => 'aircraftsystemgraphics', 'action' => 'edit', $aircraftsystemgraphic['id'], $aircraftsystem['Aircraftsystem']['id'])); ?>
		
			</td>
		</tr>
		<?php }; //End if statement?>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<div class="related">
	<?php if (!empty($aircraftsystem['Aircraftsystemgraphic'])): ?>
	<h3><?php echo __('Graphics in QA'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Media Label'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aircraftsystem['Aircraftsystemgraphic'] as $aircraftsystemgraphic): ?>
		<?php if ( $aircraftsystemgraphic['graphic_status'] == 'Completed' || $aircraftsystemgraphic['graphic_status'] == 'InternalOK' || $aircraftsystemgraphic['graphic_status'] == 'QACompleted' ){ ?>

		<tr>
			<td><?php echo $aircraftsystemgraphic['graphic_media_label']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_title']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_description']; ?></td>
						
			<td><?php if($aircraftsystemgraphic['graphic_status'] == 'Completed') echo $this->Html->image('not_started.png', array('alt' => 'not started', 'border' => '0')); 
			else if($aircraftsystemgraphic['graphic_status'] == 'InternalOK') echo $this->Html->image('in_progress.png', array('alt' => 'in progress', 'border' => '0')); 
			else if($aircraftsystemgraphic['graphic_status'] == 'QACompleted') echo $this->Html->image('completed.png', array('alt' => 'completed', 'border' => '0'));?></td> 
			<td class="actions">
				<?php if($aircraftsystemgraphic['graphic_status'] == 'QACompleted') {
					echo $this->AclHtml->link(__('View QA'), array('controller' => 'aircraftsystemgraphics', 'action' => 'qa', $aircraftsystemgraphic['id']));
					echo $this->AclHtml->link(__('Uploaded to LDMS'), array('controller' => 'aircraftsystemgraphics', 'action' => 'uploadedtolcms', $aircraftsystemgraphic['id'])); 
				} else {
					echo $this->AclHtml->link(__('QA'), array('controller' => 'aircraftsystemgraphics', 'action' => 'qa', $aircraftsystemgraphic['id']));
				};
				?>
			</td>
		</tr>
		<?php }; //End if statement?>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<div class="related">
	<?php if (!empty($aircraftsystem['Aircraftsystemgraphic'])): ?>
	<h3><?php echo __('Completed Graphics'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Media Label'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aircraftsystem['Aircraftsystemgraphic'] as $aircraftsystemgraphic): ?>
		<?php if ( $aircraftsystemgraphic['graphic_status'] == 'Uploaded to LCMS' ){ ?>

		<tr>
			<td><?php echo $aircraftsystemgraphic['graphic_media_label']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_title']; ?></td>
			<td><?php echo $aircraftsystemgraphic['graphic_description']; ?></td>
			<td class="actions">
				
						
			</td>
		</tr>
		<?php }; //End if statement?>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>



<div class="related">
	<?php if (!empty($aircraftsystem['Aircraftsystemcomment'])): ?>
	<h3><?php echo __('System Comments'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php // echo __('Date Created'); ?></th>
		<th><?php echo __('Date Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aircraftsystem['Aircraftsystemcomment'] as $aircraftsystemcomment): ?>
		<tr>
			<td><?php echo $aircraftsystemcomment['comment']; ?></td>
			<td><?php echo $aircraftsystemcomment['created_by']; ?></td>
			<td><?php echo $aircraftsystemcomment['modified_by']; ?></td>
			<td><?php // echo $aircraftsystemcomment['created']; ?></td>
			<td><?php echo $aircraftsystemcomment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->AclHtml->link(__('Edit'), array('controller' => 'aircraftsystemcomments', 'action' => 'edit', $aircraftsystemcomment['id'], $aircraftsystem['Aircraftsystem']['id'])); ?>
		
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
