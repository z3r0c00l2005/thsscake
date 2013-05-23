<div class="uploads view">
<h2><?php  echo __('Upload'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filesize'); ?></dt>
		<dd>
			<?php echo h(round($upload['Upload']['filesize']/1024/1024,2)." Mb"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filemime'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['filemime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Download'); ?></dt>
		<dd>
			<?php echo $this->Html->link(__('Download', true), array('action' => 'download', $upload['Upload']['id'])); ?>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Uploads'), array('action' => 'index')); ?> </li>
	</ul>
</div>
