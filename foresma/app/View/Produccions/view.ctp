<div class="col-md-20">
<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', 
											$produccion['Produccion']['id'],$current_user['username']), array('class' => 'btn btn-sm btn-danger'),
													__('Estas seguro de eliminar la Faena: %s?', $produccion['Produccion']['id'])); ?>
<h2>Detalle de la Produccion </h2>
<h4><strong>Id: </strong><?php echo $produccion['Produccion']['id']; ?></h4>
<h4><strong>Empleado: </strong><?php echo $produccion['Empleado']['nombre']; ?></h3>
<h4><strong>Faena: </strong><?php echo $produccion['Faena']['nombre']; ?></h3>

<td><h4><strong>Jefe faena: </strong>
            <?php foreach($empleado as $fa):
   				 if($fa['Empleado']['id'] == $produccion['Faena']['user_id']){
       				echo $fa['Empleado']['nombre'];}?>
				<?php endforeach;?></td>

<!--<h4><strong>Jefe: </strong><?php echo $produccion['Faena']['empleado_id']; ?></h3>-->

<h4><strong>Maquina</strong>: </strong><?php echo $produccion['Maquina']['nombre']; ?></h3>
<h3> Descripcion:</h3>
<table>
	<tr>
		<td><?php echo $produccion['Produccion']['descripcion']; ?></td>
	</tr>
</table>
<h3> Detalles:</h3>
<table class="table" border="0" width="100%" cellpadding="5" cellspacing="5">
	<tr>
	<td width="50%">
	<table  class="table" >
		<tr>
			<td>Dia:</td>
			<td><?php echo $this->Time->format('d/m/y',$produccion['Produccion']['dia']);?></td>
		</tr>
		<tr>
			<td>Consumo combustible:</td>
			<td><?php echo $produccion['Produccion']['comb'];?></td>
		</tr>
		<tr>
			<td>Lubricante Hidraulico:</td>
			<td><?php echo $produccion['Produccion']['lubri_h'];?></td>
		</tr>
		<tr>
			<td>Lubricante Motor:</td>
			<td><?php echo $produccion['Produccion']['lubri_m'];?></td>
		</tr>
		<tr>
			<td>Lubricante Cadenilla:</td>
			<td><?php echo $produccion['Produccion']['lubri_c'];?></td>
		</tr>
	</table>
	</td>
	<td width="50%">
	<table class="table" >
		
		<tr>
			<td>Trozado:</td>
			<td><?php echo $produccion['Produccion']['p_trozado'];?></td>
		</tr>
			<td>Descortezado:</td>
			<td><?php echo $produccion['Produccion']['p_descortezado'];?></td>
		</tr>
		<tr>
			<td>Creado: </td>
			<td><?php echo $this->Time->format('d/m/y h:i:s',$produccion['Produccion']['created']);?></td>
		</tr>
		<tr>
			<td>Modificado:</td>
			<td><?php echo $this->Time->format('d/m/y h:i:s',$produccion['Produccion']['modified']);?></td>
		</tr>
	</table>
	</td>
	</tr>
</table>



<?php
	//echo $this->Html->link('<--- Volver a lista de producciones', array('controller' => 'produccions', 'action'=> 'index'));
?>
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($produccion);?>
</pre>
<?php } ?>

</div>