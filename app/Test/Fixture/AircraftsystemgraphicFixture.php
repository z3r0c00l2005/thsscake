<?php
/**
 * AircraftsystemgraphicFixture
 *
 */
class AircraftsystemgraphicFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'aircraftsystem_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'graphictitle' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'graphicdescription' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_aircraftsystemgraphics_aircraftsystems1_idx' => array('column' => 'aircraftsystem_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'aircraftsystem_id' => 1,
			'graphictitle' => 'Lorem ipsum dolor sit amet',
			'graphicdescription' => 'Lorem ipsum dolor sit amet'
		),
	);

}
