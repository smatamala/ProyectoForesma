<div class="empleados form">
<?php echo $this->Form->create('Empleado'); ?>
	<fieldset>
		<legend><?php echo __('Editar Empleado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rut', array('class' => 'form-control', 'label' => 'Usuario'));
		echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
		echo $this->Form->input('especialidad', array('class' => 'form-control', 'label' => 'Permisos', 'type' => 'select', 'options' => array('admin' => 'Administrador', 'user' => 'Jefe de Faena','view'=>'Administración General'), array('class' => 'form-control')));
	    echo $this->Form->input('tel', array('class' => 'form-control', 'label' => 'Telefono'));
	    ?>
		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Empleado.id')), array(), __('Estas seguro de eliminar a %s?', $this->Form->value('Empleado.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Empleado'), array('action' => 'index')); ?></li>
	</ul>
</div>