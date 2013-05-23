<?php
App::uses('AppController', 'Controller');
/**
 * Aircrafttypes Controller
 *
 * @property Aircrafttype $Aircrafttype
 */
class AircrafttypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aircrafttype->recursive = 0;
		$this->set('aircrafttypes', $this->paginate());
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aircrafttype->exists($id)) {
			throw new NotFoundException(__('Invalid aircraft type'));
		}
		$options = array('conditions' => array('Aircrafttype.' . $this->Aircrafttype->primaryKey => $id));
		$this->set('aircrafttype', $this->Aircrafttype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled addition.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Aircrafttype->create();
			if ($this->Aircrafttype->save($this->request->data)) {
				$this->Session->setFlash(__('The aircraft type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aircraft type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Aircrafttype->exists($id)) {
			throw new NotFoundException(__('Invalid aircraft type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled edit.'));
			$this->redirect(array('action' => 'index'));
		}
			if ($this->Aircrafttype->save($this->request->data)) {
				$this->Session->setFlash(__('The aircraft type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aircraft type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Aircrafttype.' . $this->Aircrafttype->primaryKey => $id));
			$this->request->data = $this->Aircrafttype->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Aircrafttype->id = $id;
		if (!$this->Aircrafttype->exists()) {
			throw new NotFoundException(__('Invalid aircraft type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Aircrafttype->delete()) {
			$this->Session->setFlash(__('Aircraft type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aircraft type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
