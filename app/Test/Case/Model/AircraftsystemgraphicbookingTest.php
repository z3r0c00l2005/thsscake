<?php
App::uses('Aircraftsystemgraphicbooking', 'Model');

/**
 * Aircraftsystemgraphicbooking Test Case
 *
 */
class AircraftsystemgraphicbookingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aircraftsystemgraphicbooking',
		'app.aircraftsystemgraphic',
		'app.aircraftsystem',
		'app.aircrafttype',
		'app.aircraftsystemcomment',
		'app.aircraftsystemgraphicscomment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aircraftsystemgraphicbooking = ClassRegistry::init('Aircraftsystemgraphicbooking');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aircraftsystemgraphicbooking);

		parent::tearDown();
	}

}
