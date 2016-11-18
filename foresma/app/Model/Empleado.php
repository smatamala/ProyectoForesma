<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
App::uses('AppModel', 'Model');

class Empleado extends AppModel{
	public $displayField='nombre';

	public $validate=array(
		'nombre' => array('rule' => 'notEmpty', 
				         'message' =>'Debe ingresar un nombre'
				         ),	
		'rut' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty'
						),
					'unique' => array(
							'rule' => 'isUnique',
							'message' => 'El RUT ya se encuentra en nuestra base de datos'
						)
				),
		'tel' => array(
			'Numeric'=>array(
				'rule'=>'Numeric',
				'required' => true,
                'message' => 'Sólo números'
			)

		)
);
}