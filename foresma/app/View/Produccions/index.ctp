<div class="col-md-12">
	<h2>Producciones hasta el <?php echo date('d/m/y')?></h2>
	<h3>
		<ul>
			<?php echo $this->Html->link(__('Agregar Produccion'), array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
		</ul> 
	</h3>
</div>

<div class="col-md-12">

	<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id','#')?></th>	
			<th><?php echo $this->Paginator->sort('dia','Fecha')?></th>	
			<th><?php echo $this->Paginator->sort('Empleado.nombre','Empleado')?></th>
			<th><?php echo $this->Paginator->sort('Maquina.nombre','Maquina')?></th>
			<th><?php echo $this->Paginator->sort('Faena.nombre','Faena')?></th>
			<th><?php echo $this->Paginator->sort('Codigo.codigo','Codigo')?></th>
			<th><?php echo $this->Paginator->sort('Insumo.nombre','Insumo')?></th>
			<th><?php echo $this->Paginator->sort('modified','Modificado')?></th>
		</tr>
	</thead>
		<?php foreach($produccions as $k=>$produccion):?>
			<tr>
    			<td>
    			    <?php echo $produccion['Produccion']['id'];?>
    			</td>
    			<td>
    			    <?php echo $this->Time->format('d/m/y',$produccion['Produccion']['dia']);?>
    			</td>
    			<td>
    			    <?php echo $produccion['Empleado']['nombre'];?>
    			</td>
    			<td>
        			<?php echo $produccion['Maquina']['nombre'];?>
    			</td>
    			<td>
    			    <?php echo $produccion['Faena']['nombre'];?>
    			</td>
    			<td>
    			    <?php echo $produccion['Codigo']['codigo'];?>
    			</td>
    			<td>
    			    <?php echo $produccion['Insumo']['nombre'];?>
    			</td>
    			<td>
    			    <?php echo $this->Time->format('d/m/y h:i:s',$produccion['Produccion']['modified']);?>
    			</td>
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
<?php if($current_user['role'] == 'admin'){?>
<pre>
	<?php print_R($produccion);?>
</pre>
<?php } ?>
