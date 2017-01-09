<?php
App::uses('AppModel', 'Model');
/**
 * Insumo Model
 *
 * @property Produccion $Produccion
 */
class Insumo extends AppModel {

	public $displayField = 'nombre';
    public $validate=array(
		'nombre' => array(
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