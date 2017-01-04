<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
class Produccion extends AppModel{
	public $displayField='nombre';
	public function beforeSave($options=array()){
		if(isset($this->data[$this->alias]['pass'])):
			$passwordHasher=new BlowfishPasswordHasher();
			$this->data[$this->alias]['pass']=$passwordHasher->hash($this->data[$this->alias]['pass']);
		endif;
		return true;
	}
	
	public $belongsTo= array(
			'Empleado'=> array(
				'className'=>'Empleado',
				'foreignKey'=>'empleado_id'),

			'Maquina'=> array(
				'className'=>'Maquina',
				'foreignKey'=>'maquina_id'),

			'Faena'=> array(
				'className'=>'Faena',
				'foreignKey'=>'faena_id'
				),
			'Codigo'=> array(
				'className'=>'Codigo',
				'foreignKey'=>'codigo_id'),
			'Insumo'=> array(
				'className'=>'Insumo',
				'foreignKey'=>'insumo_id'),
		);
		
		public $validate=array(
		'dia' => array(
            'rule' => 'date',
            'message' => 'Ingrese una fecha válida',
            'allowEmpty' => true
        ),
        'faena_id' => array(//no nula
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'faena en blanco'
				)
			)
);


}
