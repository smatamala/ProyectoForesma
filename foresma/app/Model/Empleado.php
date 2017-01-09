<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
App::uses('AppModel', 'Model');

class Empleado extends AppModel{
	public $displayField='nombre';
	
	function validaRut($rut){
		$rut=$rut['rut'];
	    if(strpos($rut,"-")==false){
	        $RUT[0] = substr($rut, 0, -1);
	        $RUT[1] = substr($rut, -1);
	    }else{
	        $RUT = explode("-", trim($rut));
	    }
	    $elRut = str_replace(".", "", trim($RUT[0]));
	    $factor = 2;
	    $suma=0;
	    for($i = strlen($elRut)-1; $i >= 0; $i--){
	        $factor = $factor > 7 ? 2 : $factor;
	        $suma = $suma+$elRut{$i}*$factor++;
	    }
	    $resto = $suma % 11;
	    $dv = 11 - $resto;
	    if($dv == 11){
	        $dv=0;
	    }else if($dv == 10){
	        $dv="k";
	    }else{
	        $dv=$dv;
	    }
	    if($dv == trim(strtolower($RUT[1]))){
	        return true;
	    }else{
	    return false;
	    }
		
	}
	
	function validaG($rut){
		$rut=$rut['rut'];
	    if(strpos($rut,"-")==false){
	        return false;
	    }else{
	        return true;
	    }
	}
	function validaP($rut){
		$rut=$rut['rut'];
	    if(strpos($rut,".")==false){
	        return true;
	    }else{
	        return false;
	    }
	}
	public $hasMany= array(
			'Produccion'=> array(
				'className'=>'Produccion',
				'foreignKey'=>'empleado_id',
				'dependent' => true)
		); 
	public $validate=array(
		'nombre' => array('rule' => 'notEmpty', 
				         'message' =>'Debe ingresar un nombre.'
				         ),	
		'rut' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty'
						),
					'unique' => array(
							'rule' => 'isUnique',
							'message' => 'El RUT ya se encuentra en nuestra base de datos.'
						),
					'validaRut' => array(
							'rule' => 'validaRut',
							'message' => 'El RUT no es correcto.'
						),
					'validaG' => array(
						'rule' => 'validaG',
						'message' => 'Falta el "-".'
					),
					'validaP' => array(
						'rule' => 'validaP',
						'message' => 'Ingrese el RUT sin ".", solo agregue el "-".'
					),
				),
		'tel' => array(
			'Numeric'=>array(
				'rule'=>'Numeric',
				//'required' => true,
                'message' => 'Sólo números'
			)

		)
);

}