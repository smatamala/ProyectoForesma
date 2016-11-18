<div class="col-md-12">
	<h2>Empleados</h2>
	<h3>
		<?php if($current_user['role'] == 'admin'||$current_user['role'] == 'root'):?>
			<ul>
			<?php echo $this->Html->link(__('Agregar Empleado'), array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
		</ul> 
			<?php endif; ?>
	</h3>
</div>
<div class="col-md-12">
	<table class="table table-striped">
	    <thead>
		<tr>
			<th><?php echo $this->Paginator->sort('rut','Rut')?></th>
			<th><?php echo $this->Paginator->sort('nombre','Nombre')?></th>
			<th><?php echo $this->Paginator->sort('tel','Telefono')?></th>
			<th><?php echo $this->Paginator->sort('especialidad','Especialidad')?></th>
			<th><?php echo $this->Paginator->sort('modified','Modificado')?></th>
		
		</tr>
		</thead>
		<?php foreach($empleados as $k=>$empleado){ ?>
			<tr>
				<td><?php echo h($empleado['Empleado']['rut']);?></td>
				<td><?php echo h($empleado['Empleado']['nombre']);?></td>
				<td><?php echo h($empleado['Empleado']['tel']);?></td>
				<td><?php echo h($empleado['Empleado']['especialidad']);?></td>
				<td><?php echo h($empleado['Empleado']['modified']);?></td>
			</tr>
			<?php }?>
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
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($empleados);?>
</pre>
<?php } ?>
</div>