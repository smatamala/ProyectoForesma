<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
class Faena extends AppModel{
	public $displayField='nombre';
	public $belongsTo= array(
		'User'=>array(
			'classname'=>'User',
			'foreignKey'=>'user_id'),
		);
		public $hasMany= array(
			'Produccion'=> array(
				'className'=>'Produccion',
				'foreignKey'=>'faena_id',
				'dependent' => true
				)
		);
	public $validate=array(
		'nombre'=>array(
            'between' => array(//tamaño
                'rule' => array('between', 3, 25),
                'message' => 'Entre 3 y 25 caracteres'
            ))

		);

	public function beforeSave($options=array()){
		if(isset($this->data[$this->alias]['pass'])):
			$passwordHasher=new BlowfishPasswordHasher();
			$this->data[$this->alias]['pass']=$passwordHasher->hash($this->data[$this->alias]['pass']);
		endif;
		return true;
	}
}