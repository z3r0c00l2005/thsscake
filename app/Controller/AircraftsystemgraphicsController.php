<?php
App::uses('AppController', 'Controller');
/**
 * Aircraftsystemgraphics Controller
 *
 * @property Aircraftsystemgraphic $Aircraftsystemgraphic
 */
class AircraftsystemgraphicsController extends AppController {

	public function qa($id = null) {
		if (!$this->Aircraftsystemgraphic->exists($id)) {
			throw new NotFoundException(__('Invalid graphic'));
		}
		$options = array('conditions' => array('Aircraftsystemgraphic.' . $this->Aircraftsystemgraphic->primaryKey => $id));
		$this->set('aircraftsystemgraphic', $this->Aircraftsystemgraphic->find('first', $options));
	}

	public function qapass($id = null,$QAType = null) {
		if (!$this->Aircraftsystemgraphic->exists($id)) {
			throw new NotFoundException(__('Invalid graphic'));
		}
		$this->Aircraftsystemgraphic->id = $id;
		if ($QAType == "Internal" ){
			$this->Aircraftsystemgraphic->set('graphic_status', "InternalOK");
			$this->Aircraftsystemgraphic->save();
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'qa', $id));
		}
		if ($QAType == "External" ){
			$this->Aircraftsystemgraphic->set('graphic_status', "QACompleted");
			$this->Aircraftsystemgraphic->save();
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'qa', $id));
		}
	}		
	
	
	public function qafail($id = null,$QAType = null) {
		if (!$this->Aircraftsystemgraphic->exists($id)) {
			throw new NotFoundException(__('Invalid graphic'));
		}
		$this->Aircraftsystemgraphic->id = $id;
		if ($QAType == "Internal" ){
			$this->Aircraftsystemgraphic->set('graphic_status', "In Progress");
			$this->Aircraftsystemgraphic->save();
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'qa', $id));
		}
		if ($QAType == "External" ){
			$this->Aircraftsystemgraphic->set('graphic_status', "In Progress");
			$this->Aircraftsystemgraphic->save();
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'qa', $id));
		}
	}		

	public function devcomplete($id = null) {
		$this->Aircraftsystemgraphic->id = $id;
		$this->Aircraftsystemgraphic->saveField('graphic_status', "Completed");
		$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $id));
	}

	public function onhold($id = null,$action = null) {
		$this->Aircraftsystemgraphic->id = $id;
		if ($action == "tohold") $this->Aircraftsystemgraphic->saveField('graphic_on_hold', true);
		if ($action == "fromhold") $this->Aircraftsystemgraphic->saveField('graphic_on_hold', false);
		$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $id));
	}	
	
	public function uploadedtolcms($id = null,$action = null) {
		$this->Aircraftsystemgraphic->id = $id;
		$this->Aircraftsystemgraphic->saveField('graphic_status', 'Uploaded to LCMS');
		$this->redirect($this->referer());
	}	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aircraftsystemgraphic->recursive = 0;
		$this->set('aircraftsystemgraphics', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aircraftsystemgraphic->exists($id)) {
			throw new NotFoundException(__('Invalid graphic'));
		}
		$options = array('conditions' => array('Aircraftsystemgraphic.' . $this->Aircraftsystemgraphic->primaryKey => $id));
		$this->set('aircraftsystemgraphic', $this->Aircraftsystemgraphic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($aircraftsystem_id = null) {
		$this->Aircraftsystemgraphic->Aircraftsystem->id = $aircraftsystem_id;
		if (!$this->Aircraftsystemgraphic->Aircraftsystem->exists()) {
			throw new NotFoundException(__('Invalid System'));
		}
		if ($this->request->is('post')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled addition.'));
			$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
		}
			$this->request->data['Aircraftsystemgraphic']['aircraftsystem_id'] = $aircraftsystem_id;
			$this->request->data['Aircraftsystemgraphic']['graphic_adj_estimated_hours'] = $this->request->data['Aircraftsystemgraphic']['graphic_estimated_hours'];
			$this->Aircraftsystemgraphic->create();
			if ($this->Aircraftsystemgraphic->save($this->request->data)) {
				$this->Session->setFlash(__('The graphic has been saved'));
			//	$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
			} else {
				$this->Session->setFlash(__('The graphic could not be saved. Please, try again.'));
			}
		}
		$aircraftsystems = $this->Aircraftsystemgraphic->Aircraftsystem->find('list');
		$this->set(compact('aircraftsystems'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function edit($id = null, $aircraftsystem_id = null) {
		if (!$this->Aircraftsystemgraphic->exists($id)) {
			throw new NotFoundException(__('Invalid graphic'));
		}
		//debug($this);
		$this->Aircraftsystemgraphic->Aircraftsystem->id = $aircraftsystem_id;
		
		if (!$this->Aircraftsystemgraphic->Aircraftsystem->exists()) {
			throw new NotFoundException(__('Invalid System'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
		
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled edit.'));
			$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
		}
		
			if ($this->Aircraftsystemgraphic->save($this->request->data)) {
				$this->Session->setFlash(__('The graphic has been saved'));
			//	$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
			} else {
				$this->Session->setFlash(__('The graphic could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Aircraftsystemgraphic.' . $this->Aircraftsystemgraphic->primaryKey => $id));
			$this->request->data = $this->Aircraftsystemgraphic->find('first', $options);
		}
		$aircraftsystems = $this->Aircraftsystemgraphic->Aircraftsystem->find('list');
		$this->set(compact('aircraftsystems'));
	}
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Aircraftsystemgraphic->id = $id;
		if (!$this->Aircraftsystemgraphic->exists()) {
			throw new NotFoundException(__('Invalid graphic'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Aircraftsystemgraphic->delete()) {
			$this->Session->setFlash(__('graphic deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('graphic was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
