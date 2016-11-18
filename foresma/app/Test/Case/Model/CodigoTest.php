<?php
App::uses('Codigo', 'Model');

/**
 * Codigo Test Case
 *
 */
class CodigoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.codigo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Codigo = ClassRegistry::init('Codigo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Codigo);

		parent::tearDown();
	}

}
