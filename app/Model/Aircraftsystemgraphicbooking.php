<?php
App::uses('AppModel', 'Model');
/**
 * Aircraftsystemgraphicbooking Model
 *
 * @property Aircraftsystemgraphic $Aircraftsystemgraphic
 */
class Aircraftsystemgraphicbooking extends AppModel {
	public $actsAs = array('WhoDidIt');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'hours_expended' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Aircraftsystemgraphic' => array(
			'className' => 'Aircraftsystemgraphic',
			'foreignKey' => 'aircraftsystemgraphic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
