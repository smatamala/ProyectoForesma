<?php
App::uses('AppModel', 'Model');

class Maquina extends AppModel {
	public $displayField = 'nombre';

	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		'unique' => array(
						'rule' => 'isUnique',
						'message' => 'El Codigo ya se encuentra en nuestra base de datos.'
					)
		),
		'ano' => array(
        'rule' => array('range', 1950, 2017),
        'message' => 'Por favor el año tiene que ser entre 1950 y 2017'
    )
	);



}