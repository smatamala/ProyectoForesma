<div class="col-md-12">
	<h2>Usuarios</h2>
	<h3>
		<ul>
			<?php echo $this->Html->link(__('Agregar Usuario'), array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
		</ul>
	</h3>
</div>

<div class="col-md-12">

	<table class="table table-striped">
	<thead>
	<tr>
		<!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('Usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('Rol'); ?></th>
			<th><?php echo $this->Paginator->sort('Creado'); ?></th>
			<th><?php echo $this->Paginator->sort('Modificado'); ?></th>

			<?php if($current_user['role'] == 'admin'):?>
				<th class="actions"><?php echo __('Actions'); ?></th>
			<?php endif; ?>
	</tr>
	</thead>
		<?php foreach ($users as $user): ?>
			<tr>
			<!--<td><?php echo h($user['User']['id']); ?>&nbsp;</td>-->
				<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>

				<?php if($current_user['role'] == 'admin'):?>
					<td class="actions">
						<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-sm btn-default')); ?>
						<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-sm btn-default')); ?>
						<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-sm btn-default'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
					</td>
				<?php endif; ?>

			</tr>
		<?php endforeach; ?>
	</table>
	<p>	<?php echo $this->Paginator->counter(array(
			'format' => __('Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, 
					empezando del {:start}, al {:end}')));?>	
	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('< anterior',array(),null,array('class'=>'prev disabled'));?>
		<?php echo $this->Paginator->numbers(array('separator'=>''));?>
		<?php echo $this->Paginator->next('siguiente >',array(),null,array('class'=>'next disabled'));?>

		</div> 
</div>
	
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($users);?>
</pre>
<?php } ?>