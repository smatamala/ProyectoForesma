<div class="col-md-12">
	<h2>Faenas</h2>
	<h3><ul><?php echo $this->Html->link(__('Agregar Faenas'), array('action' => 'add')); ?>
		</ul> 
	</h3>
	<table>
		<tr>
			<th><?php echo $this->Paginator->sort('Nombre ')?></th>
			<th><?php echo $this->Paginator->sort('Jefe')?></th>
			<th><?php echo $this->Paginator->sort('Creado')?></th>
			<th><?php echo $this->Paginator->sort('Modificado')?></th>
		</tr>
		<?php foreach($faenas as $k=>$faena):?>
			<tr>
				<td><?php echo h($faena['Faena']['nombre']);?></td>
				<td><?php echo h($faena['Faena']['jefe']);?></td>
				<td><?php echo h($faena['Faena']['created']);?></td>
				<td><?php echo h($faena['Faena']['modified']);?></td>
			</tr>
			<?php endforeach;?>
	</table>
	<p>
		<?php echo $this->Paginator->counter(
			array('format'=>'Página {:page} de {:pages}, mostrando {:current} registros de {:count}')
			);?>
		</p>
		<div class="paging">
		<?php echo $this->Paginator->prev('< anterior',array(),null,array('class'=>'prev disabled'));?>
		<?php echo $this->Paginator->numbers(array('separator'=>''));?>
		<?php echo $this->Paginator->next('siguiente >',array(),null,array('class'=>'next disabled'));?>

		</div> 
</div>