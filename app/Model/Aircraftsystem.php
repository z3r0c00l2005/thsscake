<?php
App::uses('AppModel', 'Model');
/**
 * Aircraftsystem Model
 *
 * @property Aircrafttype $Aircrafttype
 * @property Aircraftsystemgraphic $Aircraftsystemgraphic
 */
class Aircraftsystem extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'system_name' => array(
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
		'Aircrafttype' => array(
			'className' => 'Aircrafttype',
			'foreignKey' => 'aircrafttype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Aircraftsystemgraphic' => array(
			'className' => 'Aircraftsystemgraphic',
			'foreignKey' => 'aircraftsystem_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
			'Aircraftsystemcomment' => array(
			'className' => 'Aircraftsystemcomment',
			'foreignKey' => 'aircraftsystem_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
			'uploads' => array(
			'className' => 'uploads',
			'foreignKey' => 'uploadsourceid',
			'dependent' => false,
			'conditions' => array('uploads.uploadsource' => 'Aircraftsystems'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		
		)
	);


}
