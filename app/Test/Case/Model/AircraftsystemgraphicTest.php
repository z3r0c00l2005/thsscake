<?php
App::uses('Aircraftsystemgraphic', 'Model');

/**
 * Aircraftsystemgraphic Test Case
 *
 */
class AircraftsystemgraphicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aircraftsystemgraphic',
		'app.aircraftsystem'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aircraftsystemgraphic = ClassRegistry::init('Aircraftsystemgraphic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aircraftsystemgraphic);

		parent::tearDown();
	}

}
