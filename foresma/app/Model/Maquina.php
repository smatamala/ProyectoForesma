<?php
App::uses('AppModel', 'Model');

class Maquina extends AppModel {
	public $displayField = 'nombre';

	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		)
	);


}