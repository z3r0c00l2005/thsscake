<?php
App::uses('AppController', 'Controller');
/**
 * Aircraftsystemgraphicbookings Controller
 *
 * @property Aircraftsystemgraphicbooking $Aircraftsystemgraphicbooking
 */
class AircraftsystemgraphicbookingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aircraftsystemgraphicbooking->recursive = 0;
		$this->set('aircraftsystemgraphicbookings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aircraftsystemgraphicbooking->exists($id)) {
			throw new NotFoundException(__('Invalid aircraftsystemgraphicbooking'));
		}
		$options = array('conditions' => array('Aircraftsystemgraphicbooking.' . $this->Aircraftsystemgraphicbooking->primaryKey => $id));
		$this->set('aircraftsystemgraphicbooking', $this->Aircraftsystemgraphicbooking->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($aircraftsystemgraphic_id = null) {
		$this->Aircraftsystemgraphicbooking->Aircraftsystemgraphic->id = $aircraftsystemgraphic_id;
		if (!$this->Aircraftsystemgraphicbooking->Aircraftsystemgraphic->exists()) {
			throw new NotFoundException(__('Invalid Graphic'));
		}
		if ($this->request->is('post')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled addition.'));
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
		}
			$this->request->data['Aircraftsystemgraphicbooking']['aircraftsystemgraphic_id'] = $aircraftsystemgraphic_id;
			$this->Aircraftsystemgraphicbooking->create();
			if ($this->Aircraftsystemgraphicbooking->save($this->request->data)) {
			$this->Aircraftsystemgraphicbooking->Aircraftsystemgraphic->set('graphic_status', "In Progress");
			$this->Aircraftsystemgraphicbooking->Aircraftsystemgraphic->save();
				$this->Session->setFlash(__('The work done has been saved'));
				$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
			} else {
				$this->Session->setFlash(__('The work done could not be saved. Please, try again.'));
			}
		}
		$aircraftsystemgraphics = $this->Aircraftsystemgraphicbooking->Aircraftsystemgraphic->find('list');
		$this->set(compact('aircraftsystemgraphics'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$aircraftsystemgraphic_id = null) {
		if (!$this->Aircraftsystemgraphicbooking->exists($id)) {
			throw new NotFoundException(__('Invalid aircraftsystemgraphicbooking'));
		}
		$this->request->data['Aircraftsystemgraphicbooking']['aircraftsystemgraphic_id'] = $aircraftsystemgraphic_id;
		if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled edit.'));
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
		}
			if ($this->Aircraftsystemgraphicbooking->save($this->request->data)) {
				$this->Session->setFlash(__('The work done has been saved'));
				$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
			} else {
				$this->Session->setFlash(__('The work done could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Aircraftsystemgraphicbooking.' . $this->Aircraftsystemgraphicbooking->primaryKey => $id));
			$this->request->data = $this->Aircraftsystemgraphicbooking->find('first', $options);
		}
		$aircraftsystemgraphics = $this->Aircraftsystemgraphicbooking->Aircraftsystemgraphic->find('list');
		$this->set(compact('aircraftsystemgraphics'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Aircraftsystemgraphicbooking->id = $id;
		if (!$this->Aircraftsystemgraphicbooking->exists()) {
			throw new NotFoundException(__('Invalid aircraftsystemgraphicbooking'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Aircraftsystemgraphicbooking->delete()) {
			$this->Session->setFlash(__('Aircraftsystemgraphicbooking deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aircraftsystemgraphicbooking was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
