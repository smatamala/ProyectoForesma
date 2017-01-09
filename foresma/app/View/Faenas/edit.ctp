<div class="users form">
<?php echo $this->Form->create('Faena'); ?>
	<fieldset>
		<legend><?php echo __('Editar Faena'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
		echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Encargado'));
	    ?>
		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Faena.id')), array(), __('Estas seguro de eliminar %s?', $this->Form->value('Faena.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Faena'), array('action' => 'index')); ?></li>
	</ul>
</div>