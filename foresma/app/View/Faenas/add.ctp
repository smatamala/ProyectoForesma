<div class="add">
	<?php echo $this->Form->create('Faena', array('role' => 'form')); ?>
	<fieldset>
		<legend>Agregar Faena</legend>
		<?php echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre de Faena'));?>
		<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Jefe de faena'));?>
		<?php //*echo $this->Form->input('ayudante', array('class' => 'form-control', 'label' => 'Jefe de faena 2'));*//?>
	</fieldset>
	<?php echo $this->Form->end('Guardar Faena');?>
</div>
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($users);?>

</pre>
<?php } ?>