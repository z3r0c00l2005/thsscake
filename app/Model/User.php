<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {


	public $actsAs = array('Acl' => array('type' => 'requester'));
	public $displayField = 'username';

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
	
	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
    public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }	
	
	/* ACL afterSave Fix, as the default acl-behavior does not save an aro's alias
     * I have created this function which can be dropped into ANY model. It will 
     * hook on after the acl-behavior has finished and set the correct alias 
     * depending on model used. No modification required.
     * 
     * Requires: displayField and name be set in model!
     *
     * Created: 26th May 2011
     * Author : Simon Dann
     * Version: 1.0.0

     */

    function afterSave($options = array()){
        $saveAro = false;

        if ($this->getLastInsertID()){
            $saveAro = true;
            $insertId = $this->getLastInsertID();
        }else{
            if ($this->data[$this->name]['id']){
                $saveAro = true;
                $insertId = $this->data[$this->name]['id'];
            }
        }
        if ($saveAro == true){
                $aroRecord = $this->Aro->find('first', array('conditions' => array('foreign_key' => $insertId, 'model' => $this->name)));
                $aroRecord['Aro']['alias'] = $this->name . '::' . $this->data[$this->name][$this->displayField];
                $this->Aro->save($aroRecord);
        }
    }
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
