<?php
App::uses('Aircraftsystem', 'Model');

/**
 * Aircraftsystem Test Case
 *
 */
class AircraftsystemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aircraftsystem',
		'app.aircrafttype',
		'app.aircraftsystemgraphic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aircraftsystem = ClassRegistry::init('Aircraftsystem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aircraftsystem);

		parent::tearDown();
	}

}
