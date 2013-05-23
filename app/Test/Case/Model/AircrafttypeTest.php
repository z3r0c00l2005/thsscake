<?php
App::uses('Aircrafttype', 'Model');

/**
 * Aircrafttype Test Case
 *
 */
class AircrafttypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aircrafttype',
		'app.aircraftsystem',
		'app.aircraftsystemgraphic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aircrafttype = ClassRegistry::init('Aircrafttype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aircrafttype);

		parent::tearDown();
	}

}
