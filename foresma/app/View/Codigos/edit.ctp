<div class="codigos form">
<?php echo $this->Form->create('Codigo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Codigo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo', array('class' => 'form-control', 'label' => 'Codigo'));
	    echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Descripción'));
	    ?>
		
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Codigo.id')), 
		                          array(), __('Estas seguro de eliminar a %s?', $this->Form->value('Codigo.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Codigo'), array('action' => 'index')); ?></li>
	</ul>
</div>