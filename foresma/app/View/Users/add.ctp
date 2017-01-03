<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>
				<fieldset>
					<legend>Agregar Ususario</legend>
				<?php
					echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Usuario'));
					echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Contraseña'));
					echo $this->Form->input('role', array('class' => 'form-control', 'label' => 'Permisos', 'type' => 'select', 'options' => array('admin' => 'Administrador', 'user' => 'Jefe de Faena','view'=>'Administración General'), array('class' => 'form-control')));

				?>
	</fieldset>

				<p>
				<?php echo $this->Form->end(array('label' => 'Agregar', 'class' =>'btn btn-success')); ?>
				</p>
		</div>
	</div>
</div>