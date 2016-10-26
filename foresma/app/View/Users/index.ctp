<div class="col-md-12">
	<h3>Usuarios</h3>
	<h2><ul><?php echo $this->Html->link(__('Agregar Usuario'), array('action' => 'add')); ?>
		</ul> 
	</h2>
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
	<tbody>
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
	</tbody>
	</table>
</div>
	
<pre>
	<?php print_R($users);?>
</pre>