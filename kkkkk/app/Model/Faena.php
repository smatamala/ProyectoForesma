<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
class Faena extends AppModel{
	public $displayField='nombre';

	public function beforeSave($options=array()){
		if(isset($this->data[$this->alias]['pass'])):
			$passwordHasher=new BlowfishPasswordHasher();
			$this->data[$this->alias]['pass']=$passwordHasher->hash($this->data[$this->alias]['pass']);
		endif;
		return true;
	}
}