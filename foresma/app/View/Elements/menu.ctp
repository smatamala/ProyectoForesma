    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link('ForesmaControl', array('controller' => 'users', 'action' => 'login'), array('class' => 'navbar-brand' )); ?>

        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <?php if($current_user['role'] == 'admin'): ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo $this->Html->link('Lista Usuarios', array('controller' => 'users', 'action' => 'index')) ?></li>
                  <li><?php echo $this->Html->link('Agregar Usuario', array('controller' => 'users', 'action' => 'add')) ?></li>
                  
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Faenas <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo $this->Html->link('Lista de Faenas', array('controller' => 'faenas', 'action' => 'index')) ?></li>
                  <li><?php echo $this->Html->link('Agregar Faena', array('controller' => 'faenas', 'action' => 'add')) ?></li>
                  
                  </ul>
              </li>
            <?php endif; ?>


          </ul>
          
                                        <!--<?php echo $this->Form->create('Platillo', array('type' => 'GET', 'class' => 'navbar-form navbar-left', 'url' => array('controller' => 'platillos', 'action' => 'search'))); ?>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control s', 'autocomplete' => 'off', 'placeholder' => 'Buscar platillo...')); ?>
                                        </div>
                                        <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
                                        <?php echo $this->Form->end(); ?>
                                        
                                        <?php echo $this->Html->link('Pedidos', array('controller' => 'pedidos', 'action' => 'view'), array('class' => 'btn btn-success navbar-btn') ); ?>
                                        -->
            <ul class="nav navbar-nav navbar-right">
              <li>
                <?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout')); ?>
              </li>
            </ul>          
          
        </div><!--/.nav-collapse -->
      </div>
    </div>