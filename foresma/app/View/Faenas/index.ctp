<div class="col-md-12">
	<h2>Faenas</h2>
	<h3>
		<ul>
			<?php echo $this->Html->link(__('Agregar Faena'), array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
		</ul> 
	</h3>
</div>

<div class="col-md-12">

	<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Nombre ')?></th>
			<th><?php echo $this->Paginator->sort('Jefe')?></th>
			<th><?php echo $this->Paginator->sort('Creado')?></th>
			<th><?php echo $this->Paginator->sort('Modificado')?></th>
		</tr>
	</thead>
		<?php foreach($faenas as $k=>$faena):?>
			<tr>
				<td><?php echo $this->Html->link($faena['Faena']['nombre'],array('controller' =>'faenas',
											'action'=> 'view',
										 	$faena['Faena']['id']));?></td>
				<td><?php echo h($users[$faena['Faena']['user_id']]);?></td>
				<td><?php echo h($faena['Faena']['created']);?></td>
				<td><?php echo h($faena['Faena']['modified']);?></td>
			</tr>
			<?php endforeach;?>
	</table>
	<p>	<?php echo $this->Paginator->counter(array(
			'format' => __('Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, 
					empezando del {:start}, al {:end}')));?>	
	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('< anterior',array(),null,array('class'=>'prev disabled'));?>
		<?php echo $this->Paginator->numbers(array('separator'=>''));?>
		<?php echo $this->Paginator->next('siguiente >',array(),null,array('class'=>'next disabled'));?>

		</div> 
</div>
<?php if($current_user['role'] == 'root'){?>
<pre>
	<?php print_R($faenas);?>

</pre>
<?php } ?>