<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-head">
            <?php if($current_user['role'] == 'admin'){
                echo $this->Html->link('Foresma Administrado: '.($current_user['username']), 
                    array('controller' => 'users', 'action' => 'index'), array('class' => 'navbar-brand'));
            }
            ?>
        <?php if($current_user == null): ?>
            <div class="navbar-nav navbar-right" style="margin:2">
                <li><?php echo $this->Form->create('User', array('class' => 'navbar-form navbar-right')); ?></li>
                <li><?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Usuario')); ?></li>
                    
                <li><?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Contraseña')); ?></li>
                    <li><?php echo $this->Form->button('Acceder', array('class' => 'btn btn-success')); ?></li>
                    <li><?php echo $this->Form->end(); ?></li>
            </div>
        </div>
        <?php endif; ?>
        <?php if($current_user != null): ?>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout')); ?>
                </li>
            </ul>   
        <?php endif; ?>
    </div>
</nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div align="center">
            <img src="http://alfaenlinea.com/wp-content/uploads/2016/04/AlfaPlus_20160401_Tech_Minion.gif">
        </div>
        <h1>Bienvenido a ForesmaControl</h1>
        <p>foresma\app\View\Users\login.ctp</p>
        <p>detalles..............................................................................................</p>

        <p><a class="btn btn-primary btn-lg" href="#" role="button">Leer más &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>xx</h2>
          <p>----------------------------------------------</p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>xxxxx</h2>
          <p>--------------------------------------------- </p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>xxxxxxxxxxxxxxxxxxxxx</h2>
          <p>-----------------------------------------------------------------------------------------</p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; </p>
      </footer>
    </div> <!-- /container -->
    <pre>
  <?php print_R($current_user);?>
</pre>