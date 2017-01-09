<div class="col-md-12">
	<h2>Codigos</h2>
	<h3>
		<ul>
			<?php echo $this->Html->link(__('Agregar Codigo'), array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
		</ul> 
	</h3>
</div>

<div class="col-md-12">

	<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Nombre ')?></th>
			<th><?php echo $this->Paginator->sort('descripcion')?></th>
			<th><?php echo $this->Paginator->sort('Modificado')?></th>
			<?php if($current_user['role'] == 'admin'):?>
				<th class="actions"><?php echo __('Opciones'); ?></th>
			<?php endif; ?>
		</tr>
	</thead>
		<?php foreach($codigos as $k=>$codigo):?>
			<tr>
				<td><?php echo h($codigo['Codigo']['codigo']);?></td>
				<td><?php echo h($codigo['Codigo']['descripcion']);?></td>
				<td><?php echo h($codigo['Codigo']['modified']);?></td>
				<?php if($current_user['role'] == 'admin'):?>
					<td class="actions">
						<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $codigo['Codigo']['id']), array('class' => 'btn btn-sm btn-default')); ?>
						<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $codigo['Codigo']['id']), 
						array('class' => 'btn btn-sm btn-default'), __('Estas seguro de eliminar el Codigo %s?', $codigo['Codigo']['codigo'])); 
						?>
					</td>
				<?php endif; ?>
			</tr>
			<?php endforeach;?>
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
	<?php print_R($codigos);?>

</pre>
<?php } ?>