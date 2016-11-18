<div class="add">
	<?php echo $this->Form->create('Maquina');?>


	<fieldset>
		<legend>Agregar Maquina</legend>
		<?php echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre'));?>
		<?php echo $this->Form->input('ano',array('class' => 'form-control','label'=>'Año'));?>
		<?php echo $this->Form->input('descripcion',array('class' => 'form-control','label'=>'Descripcion'));?>

	</fieldset>
	<?php echo $this->Form->end('Guardar Maquina',array('class' => 'form-control'));?>
</div>
