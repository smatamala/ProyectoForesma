<div class="add">
	<?php echo $this->Form->create('Insumo', array('role' => 'form')); ?>
	<fieldset>
		<legend>Agregar Faena</legend>
		<?php echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre de insumo'));?>
		<?php echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Descripcion'));?>
	</fieldset>
	<?php echo $this->Form->end('Guardar Insumo');?>
</div>
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($s);?>

</pre>
<?php } ?>