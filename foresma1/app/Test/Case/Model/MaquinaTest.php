<?php
App::uses('Maquina', 'Model');

/**
 * Maquina Test Case
 *
 */
class MaquinaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maquina',
		'app.produccion',
		'app.empleado',
		'app.faena',
		'app.empleados_faena'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maquina = ClassRegistry::init('Maquina');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maquina);

		parent::tearDown();
	}

}
