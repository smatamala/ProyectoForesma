<?php
App::uses('AppModel', 'Model');

class Maquina extends AppModel {
	public $displayField = 'nombre';

	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'ano' => array(
        'rule' => array('range', 1950, 2017),
        'message' => 'Por favor el año tiene que ser entre 1950 y 2017'
    )
	);


}