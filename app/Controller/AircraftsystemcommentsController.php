<?php
App::uses('AppController', 'Controller');
/**
 * Aircraftsystemcomments Controller
 *
 * @property Aircraftsystemcomment $Aircraftsystemcomment
 */
class AircraftsystemcommentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aircraftsystemcomment->recursive = 0;
		$this->set('aircraftsystemcomments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aircraftsystemcomment->exists($id)) {
			throw new NotFoundException(__('Invalid system comment'));
		}
		$options = array('conditions' => array('Aircraftsystemcomment.' . $this->Aircraftsystemcomment->primaryKey => $id));
		$this->set('aircraftsystemcomment', $this->Aircraftsystemcomment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($aircraftsystem_id = null) {
		$this->Aircraftsystemcomment->Aircraftsystem->id = $aircraftsystem_id;
		if (!$this->Aircraftsystemcomment->Aircraftsystem->exists()) {
			throw new NotFoundException(__('Invalid System'));
		}
		if ($this->request->is('post')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled addition.'));
			$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
		}
		//	$this->request->data['Aircraftsystemcomment']['created_by'] = $this->Auth->user('id');
		//	$this->request->data['Aircraftsystemcomment']['modified_by'] = $this->Auth->user('id');
			$this->request->data['Aircraftsystemcomment']['aircraftsystem_id'] = $aircraftsystem_id;
			$this->Aircraftsystemcomment->create();
			if ($this->Aircraftsystemcomment->save($this->request->data)) {
				$this->Session->setFlash(__('The system comment has been saved'));
			//	$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
			} else {
				$this->Session->setFlash(__('The system comment could not be saved. Please, try again.'));
			}
		}
		$aircraftsystems = $this->Aircraftsystemcomment->Aircraftsystem->find('list');
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
		if (!$this->Aircraftsystemcomment->exists($id)) {
			throw new NotFoundException(__('Invalid System Comment'));
		}

		$this->Aircraftsystemcomment->Aircraftsystem->id = $aircraftsystem_id;
		if (!$this->Aircraftsystemcomment->exists($id)) {
			throw new NotFoundException(__('Invalid System Comment'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled edit.'));
			$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
		}
		//	$this->request->data['Aircraftsystemcomment']['modified_by'] = $this->Auth->user('id');
			if ($this->Aircraftsystemcomment->save($this->request->data)) {
				$this->Session->setFlash(__('The system comment has been saved'));
			//	$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller'=>'Aircraftsystems','action' => 'view', $aircraftsystem_id));
			} else {
				$this->Session->setFlash(__('The system comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Aircraftsystemcomment.' . $this->Aircraftsystemcomment->primaryKey => $id));
			$this->request->data = $this->Aircraftsystemcomment->find('first', $options);
		}
		$aircraftsystems = $this->Aircraftsystemcomment->Aircraftsystem->find('list');
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
		$this->Aircraftsystemcomment->id = $id;
		if (!$this->Aircraftsystemcomment->exists()) {
			throw new NotFoundException(__('Invalid system comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Aircraftsystemcomment->delete()) {
			$this->Session->setFlash(__('System comment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('System comment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

