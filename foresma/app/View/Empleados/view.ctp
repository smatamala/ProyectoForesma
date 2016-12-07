<div class="col-md-20">
<h2>Detalle del Empleado:  <?php echo $empleado['Empleado']['nombre']; ?></h2>
<p><strong>Rut: </strong><?php echo $empleado['Empleado']['rut']; ?></p>
<p><strong>teléfono: </strong><?php echo $empleado['Empleado']['tel']; ?></p>

<h3> Producciones</h3>
<?php if (empty($empleado['Produccion'])){// no ay producciones?>
	<p>No tiene Producciones asociadas</p>
	<?php }else{//else si ahy producciones?>
	<table>
		<tr>
				<th><?php echo $this->Paginator->sort('id','#')?></th>
				<th><?php echo $this->Paginator->sort('dia','Dia')?></th>
				<th><?php echo $this->Paginator->sort('faena_id','Faena')?></th>
				<th><?php echo $this->Paginator->sort('produccion_t','Trozado')?></th>
				<th><?php echo $this->Paginator->sort('produccion_d','Descortezado')?></th>
				<th><?php echo $this->Paginator->sort('modified','Modificado')?></th>
		</tr>

	<?php $prodt=0;	$prodd=0;
	foreach($empleado['Produccion'] as $produccion){ ?>
		<tr>
			<td><div align="center"><?php echo $this->Html->link($produccion['id'],array('controller' =>'produccions',
											'action'=> 'view',
										 	$produccion['id']));?></div></td>
			<td><?php echo $this->Time->format('d/m/y',$produccion['dia']);?></td>
			<td><?php echo $this->Html->link($faenas[$produccion['faena_id']],array('controller' =>'faenas',
											'action'=> 'view',
										 	$produccion['faena_id']));?></td>
			<td><?php echo $produccion['p_trozado'];?></td>
			<td><?php echo $produccion['p_descortezado'];?></td>
			<td><?php echo $this->Time->format('d/m/y H:i:s',$produccion['modified']);?></td>
			<?php if($current_user['role'] == 'root'){?>
					<td class="actions">
						<?php echo $this->Html->link(__('Ver'), array('controller' =>'produccions','action' => 'view', $produccion['id']), array('class' => 'btn btn-sm btn-default')); ?>
						<?php echo $this->Html->link(__('Editar'), array('controller' =>'produccions','action' => 'edit', $produccion['id']), array('class' => 'btn btn-sm btn-default')); ?>
						<?php echo $this->Form->postLink(__('Eliminar'), array('controller' =>'produccions','action' => 'delete', $produccion['id']), array('class' => 'btn btn-sm btn-default'), __('Estas seguro de eliminar al empleado: %s?', $produccion['id'])); ?>
					</td>
				<?php }?>
			
		</tr>
		<?php 
			$prodt = $prodt + $produccion['p_trozado'];
			  $prodd = $prodd + $produccion['p_descortezado'];
			  }?>
	</table>
	<p></p>
	<h3>Produccion Total</h3>
	<table class="table">
		<tr>
			<td>Trozado</td>
			<td>Descortezado</td>
		</tr>
		<tr>
			<td><?php echo $prodt; ?></td>
			<td><?php echo $prodd; ?></td>
		</tr>
	</table>
<?php }//end else si ahy producciones
	echo $this->Html->link('Volver a lista de Empleados', array('controller' => 'empleados', 'action'=> 'index'));
	?>
	<p></p>
	<?php
	echo $this->Html->link('Ir a lista de Producciones', array('controller' => 'produccions', 'action'=> 'index'));
?>
</div>
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($empleado);?>
	<?php print_R($faenas);?>
	<?php print_R($id);?>
	
</pre>
<?php } ?>