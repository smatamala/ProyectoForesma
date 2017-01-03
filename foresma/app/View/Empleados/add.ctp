<div class="container">
	<div class="row">
		<div class="col-md-6">
	<?php echo $this->Form->create('Empleado');?>


	<fieldset>
		<legend>Agregar Empleado</legend>
		<?php //echo $this->Html->link('Volver a Empleados',array('action'=>'index'));?>
		
		<?php echo $this->Form->input('rut',array('class' => 'form-control','label'=>'Rut'));?>
		<?php echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre'));?>
		<?php echo $this->Form->input('especialidad',array('class' => 'form-control','label'=>'Especialidad'));?>
		<?php echo $this->Form->input('tel',array('class' => 'form-control','label'=>'Telefono'));?>

	</fieldset>
	<?php echo $this->Form->end('Guardar Empleado',array('class' => 'form-control'));?>
</div>
</div>
</div>