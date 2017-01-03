<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Usuario'));
		echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Contraseña ->Ingrese la contraseña nuevamente','value'=>' '));
		echo $this->Form->input('role', array('class' => 'form-control', 'label' => 'Permisos', 'type' => 'select', 'options' => array('admin' => 'Administrador', 'user' => 'Jefe de Faena','view'=>'Administración General'), array('class' => 'form-control')));?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Estas seguro de eliminar al usuario %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('action' => 'index')); ?></li>
	</ul>
</div>