<div class="add">
	<?php 
	$empleado=null;
	echo $this->Form->create('Produccion');
	?>
	<fieldset>
	    <legend>Agregar Produccion</legend>
		<table>
			<tr>
				<td>
				    <div class="form-group" width="30%"><?php 
					$meses = array(
						'01' =>'Enero',
						'02' => 'Febrero',
						'03' => 'Marzo',
						'04' => 'Abril',
						'05' => 'Mayo',
						'06' => 'Junio',
						'07' => 'Julio',
						'08' => 'Agosto',
						'09' => 'Septiembre',
						'10' => 'Octubre',
						'11' => 'Noviembre',
						'12' => 'Diciembre');
						echo $this->Form->input('dia', array(
				        'class' => 'form-control',
				        'label' =>'Fecha',
				        'dateFormat' => 'DMY',
				        'monthNames' => $meses,
				        'minYear' => date('Y') - 70,
				        'div' => array('class' => 'form-inline'),
				        'between' => '<div class="form-group">',
				        'separator' => '</div><div class="form-group">',
				        'after' => '</div>'));?>
                    </div>
                </td>
            </tr>
            </table>
		<table>
            <tr>
              <td><?php	echo $this->Form->input('faena_id',array('class' => 'form-control'));?></td>
			  <td><?php	echo $this->Form->input('empleado_id',array('class' => 'form-control'));?></td>
			  <td><?php echo $this->Form->input('maquina_id',array('class' => 'form-control')); ?></td>
			  <td><?php	echo $this->Form->input('codigo_id',array('class' => 'form-control'));?></td>
			  <td><?php echo $this->Form->input('insumo_id',array('class' => 'form-control')); ?></td>
			</tr>
		</table>
		<table>
			<h4>Produccion</h4>
			<tr>
				<td><?php echo $this->Form->input('p_trozado',array('label'=>'Trozado','class' => 'form-control','value'=>'0'));?></td>
				<td><?php echo $this->Form->input('p_descortezado',array('label'=>'Descortezado','class' => 'form-control','value'=>'0'));?></td>
            </tr>
		</table>
			
			<!--- <?php	echo $this->Form->input('tipo', array('class' => 'form-control', 
										'label' => 'Tipo', 'type' => 'select', 'options' => array(
											'm/r' => 'm/r', 'm3' => 'm3'), array('class' => 'form-control')));?> 
			--->
		<table>
			<h4>Consumo de Combustible y Lubricantes</h4>
			<tr>
				<td><?php echo $this->Form->input('comb',array('label'=>'Combustible','class' => 'form-control','value'=>'0'));?></td>
				<td><?php echo $this->Form->input('lubri_h',array('label'=>'Lubricante Hidraulico','class' => 'form-control','value'=>'0'));?></td>
				<td><?php echo $this->Form->input('lubri_m',array('label'=>'Lubricante Motor','class' => 'form-control','value'=>'0'));?></td>
				<td><?php echo $this->Form->input('lubri_c',array('label'=>'Lubricante Cadenilla','class' => 'form-control','value'=>'0'));?></td>
			</tr>
		</table>
		<table>
			<h4>Detalles</h4>
			<tr>
				<td><?php echo $this->Form->input('descripcion',array('label'=>'Descripcion','class' => 'form-control'));?></td>
			</tr>
		</table>
	</fieldset>
	<?php echo $this->Form->end('Agregar produccion');?>
</div>

<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($faenas);?>
	<?php print_R($faena);?>
	<?php print_R($empleado);?>
	<?php print_R($codigos);?>
</pre>
<?php } ?>