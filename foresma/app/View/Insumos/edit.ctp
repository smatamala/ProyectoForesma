<div class="codigos form">
<?php echo $this->Form->create('Insumo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Insumo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
	    echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Descripción'));
	    ?>
		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Insumo.id')), 
		                          array(), __('Estas seguro de eliminar a %s?', $this->Form->value('Insumo.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Insumo'), array('action' => 'index')); ?></li>
	</ul>
</div>