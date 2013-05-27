<?php
App::uses('AppController', 'Controller');
/**
 * Aircraftsystemgraphicscomments Controller
 *
 * @property Aircraftsystemgraphicscomment $Aircraftsystemgraphicscomment
 */
class AircraftsystemgraphicscommentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aircraftsystemgraphicscomment->recursive = 0;
		$this->set('aircraftsystemgraphicscomments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aircraftsystemgraphicscomment->exists($id)) {
			throw new NotFoundException(__('Invalid aircraftsystemgraphicscomment'));
		}
		$options = array('conditions' => array('Aircraftsystemgraphicscomment.' . $this->Aircraftsystemgraphicscomment->primaryKey => $id));
		$this->set('aircraftsystemgraphicscomment', $this->Aircraftsystemgraphicscomment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($aircraftsystemgraphic_id = null, $commentsource = null) {
		$this->Aircraftsystemgraphicscomment->Aircraftsystemgraphic->id = $aircraftsystemgraphic_id;
		if (!$this->Aircraftsystemgraphicscomment->Aircraftsystemgraphic->exists()) {
			throw new NotFoundException(__('Invalid Graphic'));
		}
		if ($this->request->is('post')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled addition.'));
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
		}
			$this->request->data['Aircraftsystemgraphicscomment']['aircraftsystemgraphic_id'] = $aircraftsystemgraphic_id;
			$this->request->data['Aircraftsystemgraphicscomment']['comment_source'] = $commentsource;
			$this->Aircraftsystemgraphicscomment->create();
			if ($this->Aircraftsystemgraphicscomment->save($this->request->data)) {
				$this->Session->setFlash(__('The graphic comment has been saved'));
			//	$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
			} else {
				$this->Session->setFlash(__('The graphic comment could not be saved. Please, try again.'));
			}
		}
		$aircraftsystemgraphics = $this->Aircraftsystemgraphicscomment->Aircraftsystemgraphic->find('list');
		$this->set(compact('aircraftsystemgraphics'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $aircraftsystemgraphic_id = null) {
		if (!$this->Aircraftsystemgraphicscomment->exists($id)) {
			throw new NotFoundException(__('Invalid system graphics comment'));
		}
		$this->Aircraftsystemgraphicscomment->Aircraftsystemgraphic->id = $aircraftsystemgraphic_id;
		if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled edit.'));
			$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
		}
			if ($this->Aircraftsystemgraphicscomment->save($this->request->data)) {
				$this->Session->setFlash(__('The graphic comment has been saved'));
				$this->redirect(array('controller'=>'Aircraftsystemgraphics','action' => 'view', $aircraftsystemgraphic_id));
			} else {
				$this->Session->setFlash(__('The graphic comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Aircraftsystemgraphicscomment.' . $this->Aircraftsystemgraphicscomment->primaryKey => $id));
			$this->request->data = $this->Aircraftsystemgraphicscomment->find('first', $options);
		}
		$aircraftsystemgraphics = $this->Aircraftsystemgraphicscomment->Aircraftsystemgraphic->find('list');
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
		$this->Aircraftsystemgraphicscomment->id = $id;
		if (!$this->Aircraftsystemgraphicscomment->exists()) {
			throw new NotFoundException(__('Invalid aircraftsystemgraphicscomment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Aircraftsystemgraphicscomment->delete()) {
			$this->Session->setFlash(__('Graphic comment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('System graphics comment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
