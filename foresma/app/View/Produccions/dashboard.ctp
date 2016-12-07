<div class="table-responsive">

	<h2>Resumen mensual hasta la fecha de hoy <?php echo date('d/m/y')?></h2>

<?php
$fecha=date('m/y');
$ano=date('y');
$mes=date('m');
$ft=0;
$fd=0;
$fcc=0;
$ftt=0;
$fdt=0;
$fcct=0;
$meses = array(
						'1' =>'Enero',
						'2' => 'Febrero',
						'3' => 'Marzo',
						'4' => 'Abril',
						'5' => 'Mayo',
						'6' => 'Junio',
						'7' => 'Julio',
						'8' => 'Agosto',
						'9' => 'Septiembre',
						'10' => 'Octubre',
						'11' => 'Noviembre',
						'12' => 'Diciembre');
?>

<h2><?php echo $meses[$mes],' de 20',date('y')?></h2>

<div class="col-md-6">
    
    <h2>Faenas</h2>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th><?php echo 'Faena'?></th>	
			<th><?php echo 'Trozado'?></th>	
			<th><?php echo 'Descortezado'?></th>
			<th><?php echo 'Combustible'?></td>
		</tr>
	</thead>
	<?php foreach($faenas as $k=>$faena){
		    foreach($produccions as $k=>$produccion){
		        if($fecha==$this->Time->format('m/y',$produccion['Produccion']['dia'])){
			    if ($produccion['Produccion']['faena_id']==$faena['Faena']['id']){
			        $ft=$ft+ $produccion['Produccion']['p_trozado'];
			        $fd=$fd+ $produccion['Produccion']['p_descortezado'];
			        $fcc=$fcc+ $produccion['Produccion']['comb'];
			    }
			
			}}?>
			<tr>
			    <td><?php echo $faena['Faena']['nombre']  ?></td>
				<td><?php echo $ft;?></td>
				<td><?php echo $fd;?></td>
				<td><?php echo $fcc;?></td>
			</tr>
			
			<?php
			$ftt=$ftt+$ft;
			$fdt=$fdt+$fd;
			$fcct=$fcct+$fcc;
			$ft=0;
            $fd=0;
            $fcc=0;} ?>
            <tr>
			    <th scope="row"><?php echo 'Totales'  ?></th>
				<th><?php echo $ftt;?></th>
				<th><?php echo $fdt;?></th>
				<th><?php echo $fcct;?></th>
			</tr>
	</table>
</div>

<?php
$ftt=0;
$fdt=0;
$fcct=0;
$et=0;
$ed=0;
$ett=0;
$edt=0;
?>
<div class="col-md-6">
    <h2>Empleados</h2>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th><?php echo 'Empleado'?></th>	
			<th><?php echo 'Trozado'?></th>	
			<th><?php echo 'Descortezado'?></th>
		</tr>
	</thead>
	<?php foreach($empleados as $k=>$empleado){
		    foreach($produccions as $k=>$produccion){
		        if($fecha==$this->Time->format('m/y',$produccion['Produccion']['dia'])){
			    if ($produccion['Produccion']['empleado_id']==$empleado['Empleado']['id']){
			        $et=$et+ $produccion['Produccion']['p_trozado'];
			        $ed=$ed+ $produccion['Produccion']['p_descortezado'];
			    }
			
			}}?>
			<tr>
			    <td><?php echo $empleado['Empleado']['nombre']  ?></td>
				<td><?php echo $et;?></td>
				<td><?php echo $ed;?></td>
			</tr>
			
			<?php
			$ett=$ett+$et;
            $edt=$edt+$ed;
			$et=0;
            $ed=0;
            } ?>
            <tr>
			    <th><?php echo 'Totales'  ?></th>
				<th><?php echo $ett;?></th>
				<th><?php echo $edt;?></th>
			</tr>
	</table>
</div>


<?php 
$ett=0;
$edt=0;
			$mes=$mes-1;
			if($mes==0){
			    $mes=12;
			    $ano=$ano-1;
			}
?>
<h2><?php echo $meses[$mes],' de 20',$ano?></h2>
<div class="col-md-6">

    <h2>Faenas</h2>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th><?php echo 'Faena'?></th>	
			<th><?php echo 'Trozado'?></th>	
			<th><?php echo 'Descortezado'?></th>
			<th><?php echo 'Combustible'?></th>
		</tr>
	</thead>
	<?php foreach($faenas as $k=>$faena){
		    foreach($produccions as $k=>$produccion){
		        if($mes==$this->Time->format('m',$produccion['Produccion']['dia'])
		            and $ano==$this->Time->format('y',$produccion['Produccion']['dia'])){
			    if ($produccion['Produccion']['faena_id']==$faena['Faena']['id']){
			        $ft=$ft+ $produccion['Produccion']['p_trozado'];
			        $fd=$fd+ $produccion['Produccion']['p_descortezado'];
			        $fcc=$fcc+ $produccion['Produccion']['comb'];
			    }
			
			}}?>
			<tr>
			    <td><?php echo $faena['Faena']['nombre']  ?></td>
				<td><?php echo $ft;?></td>
				<td><?php echo $fd;?></td>
				<td><?php echo $fcc;?></td>
			</tr>
			
			<?php
			$ftt=$ftt+$ft;
			$fdt=$fdt+$fd;
			$fcct=$fcct+$fcc;
			$ft=0;
            $fd=0;
            $fcc=0;} ?>
            <tr>
			    <th><?php echo 'Totales'  ?></th>
				<th><?php echo $ftt;?></th>
				<th><?php echo $fdt;?></th>
				<th><?php echo $fcct;?></th>
			</tr>
	</table>
</div>

<?php
$ftt=0;
$fdt=0;
$fcct=0;
$et=0;
$ed=0;
?>
<div class="col-md-6">
    <h2>Empleados</h2>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th><?php echo 'Empleado'?></th>	
			<th><?php echo 'Trozado'?></th>	
			<th><?php echo 'Descortezado'?></th>
		</tr>
	</thead>
	<?php foreach($empleados as $k=>$empleado){
		    foreach($produccions as $k=>$produccion){
		        if($mes==$this->Time->format('m',$produccion['Produccion']['dia'])
		            and $ano==$this->Time->format('y',$produccion['Produccion']['dia'])){
			    if ($produccion['Produccion']['empleado_id']==$empleado['Empleado']['id']){
			        $et=$et+ $produccion['Produccion']['p_trozado'];
			        $ed=$ed+ $produccion['Produccion']['p_descortezado'];
			    }
			
			}}?>
			<tr>
			    <td><?php echo $empleado['Empleado']['nombre']  ?></td>
				<td><?php echo $et;?></td>
				<td><?php echo $ed;?></td>
			</tr>
			
			<?php
			$ett=$ett+$et;
            $edt=$edt+$ed;
			$et=0;
            $ed=0;
            } ?>
            <tr>
			    <th><?php echo 'Totales'  ?></th>
				<th><?php echo $ett;?></th>
				<th><?php echo $edt;?></th>
			</tr>
	</table>
</div>