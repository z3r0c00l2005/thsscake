<?php
/**
 * AircraftsystemFixture
 *
 */
class AircraftsystemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'aircrafttype_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'systemname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'systemdescription' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_aircraftsystems_aircrafttypes_idx' => array('column' => 'aircrafttype_id', 'unique' => 0)
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
			'aircrafttype_id' => 1,
			'systemname' => 'Lorem ipsum dolor sit amet',
			'systemdescription' => 'Lorem ipsum dolor sit amet'
		),
	);

}
