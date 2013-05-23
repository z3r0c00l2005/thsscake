<?php
App::uses('Aircraftsystemcomment', 'Model');

/**
 * Aircraftsystemcomment Test Case
 *
 */
class AircraftsystemcommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aircraftsystemcomment',
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
		$this->Aircraftsystemcomment = ClassRegistry::init('Aircraftsystemcomment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aircraftsystemcomment);

		parent::tearDown();
	}

}
