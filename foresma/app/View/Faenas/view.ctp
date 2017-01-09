<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', 
											$faena['Faena']['id'],$current_user['username']), array('class' => 'btn btn-danger'),
													__('Estas seguro de eliminar la Faena: %s?', $faena['Faena']['nombre']));
		echo "  ";
		echo $this->Html->link(__('Editar'), array('action' => 'edit',$faena['Faena']['id']),array('class' => 'btn btn-success')); 
		?>
<h2>Detalle de la Faena: <?php echo $faena['Faena']['nombre']; ?></h2>

<p><strong>Jefe: </strong><?php echo $faena['User']['username']; ?></p>



<h3> Producciones</h3>
<?php if (empty($faena['Produccion'])){?>
	<p>No tiene Producciones asociadas</p>
	<?php }else{ ?>
	<table class="table">
		<tr>
				<th><div align="center"># 						</div></th>
				<th><div align="center">Dia					 	</div></th>
				<th><div align="center">Trozado					</div></th>
				<th><div align="center">Descortezado 			</div></th>
				<th><div align="center">Observaciones 			</div></th>
				<th><div align="center">Modificado 				</div></th>
		</tr>

	<?php 
	$prodt=0;	$prodd=0;
	$array=rsort($faena['Produccion']);
	foreach($faena['Produccion'] as $produccion){ ?>
		<tr>
			<td><div align="center"><?php echo $this->Html->link($produccion['id'],array('controller' =>'produccions',
											'action'=> 'view',
										 	$produccion['id']));?></div></td>
			<td><?php echo $this->Time->format('d/m/y',$produccion['dia']);?></td>
			<td><?php echo $produccion['p_trozado'];?></td>
			<td><?php echo $produccion['p_descortezado'];?></td>
			<td><?php if ($produccion['descripcion']==''){
						echo "no";
						}else{
							echo $this->Html->link("VER",array('controller' =>'produccions',
											'action'=> 'view',
										 	$produccion['id']));
						}?></td>
			<td><?php echo $this->Time->format('d/m/y H:i:s',$produccion['modified']);?></td>
			

		</tr>
		<?php $prodt = $prodt + $produccion['p_trozado'];
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
			<td><?php echo $prodt ?></td>
			<td><?php echo $prodd ?></td>
		</tr>
	</table>
<?php }?>

<?php
	//echo $this->Html->link('Volver a lista de producciones', array('controller' => 'produccions', 'action'=> 'index'));
?>
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($faena);?>
	<?php print_R($produccion);?>
</pre>
<?php } ?>