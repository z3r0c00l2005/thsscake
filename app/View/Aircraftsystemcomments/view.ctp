<div class="aircraftsystemcomments view">
<h2><?php  echo __('Aircraftsystemcomment'); ?></h2>
	<dl>		
		<dt><?php echo __('Aircraftsystem'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aircraftsystemcomment['Aircraftsystem']['system_name'] .' - ' . $aircraftsystemcomment['Aircraftsystem']['system_description'], array('controller' => 'aircraftsystems', 'action' => 'view', $aircraftsystemcomment['Aircraftsystem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemcomment['Aircraftsystemcomment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemcomment['Aircraftsystemcomment']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemcomment['Aircraftsystemcomment']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aircraftsystemcomment'), array('action' => 'edit', $aircraftsystemcomment['Aircraftsystemcomment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aircraftsystemcomment'), array('action' => 'delete', $aircraftsystemcomment['Aircraftsystemcomment']['id']), null, __('Are you sure you want to delete # %s?', $aircraftsystemcomment['Aircraftsystemcomment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aircraftsystemcomments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystemcomment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aircraftsystems'), array('controller' => 'aircraftsystems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystem'), array('controller' => 'aircraftsystems', 'action' => 'add')); ?> </li>
	</ul>
</div>
