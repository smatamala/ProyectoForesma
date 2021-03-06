<div class="col-md-12">
	<h2>Insumos</h2>
	<h3>
		<ul>
			<?php echo $this->Html->link(__('Agregar Insumo'), array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
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
		<?php foreach($insumos as $k=>$insumo):?>
			<tr>
				<td><?php echo h($insumo['Insumo']['nombre']);?></td>
				<td><?php echo h($insumo['Insumo']['descripcion']);?></td>
				<td><?php echo h($insumo['Insumo']['modified']);?></td>
				<?php if($current_user['role'] == 'admin'):?>
					<td class="actions">
						<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $insumo['Insumo']['id']), array('class' => 'btn btn-sm btn-default')); ?>
						<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $insumo['Insumo']['id']), 
						array('class' => 'btn btn-sm btn-default'), __('Estas seguro de eliminar el Insumo %s?', $insumo['Insumo']['nombre'])); 
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
	<?php print_R($s);?>

</pre>
<?php } ?>