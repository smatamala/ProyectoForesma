<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Usuario en blanco',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		'login' => array(
        'rule' => 'isUnique',
        'message' => 'Este nombre de usuario ya ha sido asignado.'
            )),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
				
	);
	

			
			
	public function beforeSave($options=array()){
		if(isset($this->data[$this->alias]['password'])):
			$passwordHasher=new BlowfishPasswordHasher();
			$this->data[$this->alias]['password']=$passwordHasher->hash($this->data[$this->alias]['password']);
		endif;
		return true;
	}
}
