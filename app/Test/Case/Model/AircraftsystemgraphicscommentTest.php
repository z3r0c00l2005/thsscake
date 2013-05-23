<?php
App::uses('Aircraftsystemgraphicscomment', 'Model');

/**
 * Aircraftsystemgraphicscomment Test Case
 *
 */
class AircraftsystemgraphicscommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aircraftsystemgraphicscomment',
		'app.aircraftsystemgraphics'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aircraftsystemgraphicscomment = ClassRegistry::init('Aircraftsystemgraphicscomment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aircraftsystemgraphicscomment);

		parent::tearDown();
	}

}
