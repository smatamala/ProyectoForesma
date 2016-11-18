<div class="add">
	<?php echo $this->Form->create('Codigo', array('role' => 'form')); ?>
	<fieldset>
		<legend>Agregar Codigo</legend>
		<?php echo $this->Form->input('codigo',array('class' => 'form-control','label'=>'Codigo'));?>
		<?php echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Descripcion'));?>
		<?php //*echo $this->Form->input('ayudante', array('class' => 'form-control', 'label' => 'Jefe de faena 2'));*//?>
	</fieldset>
	<?php echo $this->Form->end('Guardar Codigo');?>
</div>
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($s);?>

</pre>
<?php } ?>