<div class="aircraftsystemgraphicscomments view">
<h2><?php  echo __('Aircraftsystemgraphicscomment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aircraftsystemgraphics'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aircraftsystemgraphicscomment['Aircraftsystemgraphics']['id'], array('controller' => 'aircraftsystemgraphics', 'action' => 'view', $aircraftsystemgraphicscomment['Aircraftsystemgraphics']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aircraftsystemgraphicscomment'), array('action' => 'edit', $aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aircraftsystemgraphicscomment'), array('action' => 'delete', $aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['id']), null, __('Are you sure you want to delete # %s?', $aircraftsystemgraphicscomment['Aircraftsystemgraphicscomment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aircraftsystemgraphicscomments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphicscomment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aircraftsystemgraphics'), array('controller' => 'aircraftsystemgraphics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aircraftsystemgraphics'), array('controller' => 'aircraftsystemgraphics', 'action' => 'add')); ?> </li>
	</ul>
</div>
