<?php
App::uses('AppModel', 'Model');
/**
 * Aircraftsystemgraphic Model
 *
 * @property Aircraftsystem $Aircraftsystem
 * @property Aircraftsystemgraphicscomment $Aircraftsystemgraphicscomment
 */
class Aircraftsystemgraphic extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'graphic_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'graphic_media_label' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'graphic_estimated_hours' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'graphic_adj_estimated_hours' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'on' => 'update'
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
		'Aircraftsystem' => array(
			'className' => 'Aircraftsystem',
			'foreignKey' => 'aircraftsystem_id',
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
		'Aircraftsystemgraphicscomment' => array(
			'className' => 'Aircraftsystemgraphicscomment',
			'foreignKey' => 'aircraftsystemgraphic_id',
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
		'Aircraftsystemgraphicsbooking' => array(
			'className' => 'Aircraftsystemgraphicbooking',
			'foreignKey' => 'aircraftsystemgraphic_id',
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
			'conditions' => array('uploads.uploadsource' => 'Aircraftsystemgraphics'),
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
