<div class="maquinas form">
<?php echo $this->Form->create('Maquina'); ?>
	<fieldset>
		<legend><?php echo __('Editar Maquina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
		echo $this->Form->input('ano', array('class' => 'form-control', 'label' => 'Año'));
	    echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Descripción'));
	    ?>
		
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Maquina.id')), 
		                          array(), __('Estas seguro de eliminar a %s?', $this->Form->value('Maquina.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Maquina'), array('action' => 'index')); ?></li>
	</ul>
</div>