<?php
App::uses('AppModel', 'Model');
/**
 * Codigo Model
 *
 * @property Produccion $Produccion
 */
class Codigo extends AppModel {

	public $displayField = 'codigo';
	
	public $validate=array(
		'codigo' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty'
						),
					'unique' => array(
							'rule' => 'isUnique',
							'message' => 'El Codigo ya se encuentra en nuestra base de datos.'
						),
					)
);

	
	

}