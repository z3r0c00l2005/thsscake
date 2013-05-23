<?php
App::uses('AppController', 'Controller');
/**
 * Aircraftsystems Controller
 *
 * @property Aircraftsystem $Aircraftsystem
 */
class AircraftsystemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aircraftsystem->recursive = 0;
		$this->set('aircraftsystems', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $at_id = null) {
		if (!$this->Aircraftsystem->exists($id)) {
			throw new NotFoundException(__('Invalid aircraftsystem'));
		}
		$options = array('conditions' => array('Aircraftsystem.' . $this->Aircraftsystem->primaryKey => $id));
		$this->set('aircraftsystem', $this->Aircraftsystem->find('first', $options));
		$this->Aircraftsystem->Aircrafttype->id = $at_id;
		$this->set('aircraftname', $this->Aircraftsystem->Aircrafttype->find('first', array('conditions' => array('Aircrafttype.id' => $at_id))));

	/* Test */
		$num_graphics=$this->Aircraftsystem->Aircraftsystemgraphic->find('count',array('conditions'=>array('Aircraftsystemgraphic.aircraftsystem_id'=>$id)));
		$num_graphics_in_progress=$this->Aircraftsystem->Aircraftsystemgraphic->find('count',array('conditions'=>array('Aircraftsystemgraphic.aircraftsystem_id'=>$id,'Aircraftsystemgraphic.graphic_status'=>'In Progress')));
		$num_graphics_completed=$this->Aircraftsystem->Aircraftsystemgraphic->find('count',array('conditions'=>array('Aircraftsystemgraphic.aircraftsystem_id'=>$id,'Aircraftsystemgraphic.graphic_status'=>'Completed')));
		$num_graphics_hold=$this->Aircraftsystem->Aircraftsystemgraphic->find('count',array('conditions'=>array('Aircraftsystemgraphic.aircraftsystem_id'=>$id,'Aircraftsystemgraphic.graphic_on_hold'=>1)));
		if ($num_graphics==0) {
			$graphicstatus = 'Not Started';
			$this->set('graphicstatus', $graphicstatus);
		}
		if ($num_graphics>0) {
			$graphicstatus = 'In Progress';
			$this->set('graphicstatus', $graphicstatus);
		}
		
		$num_graphics_in_progress = $num_graphics_in_progress - $num_graphics_hold;
		
		$this->set('numbergraphics',$num_graphics);
		$this->set('numbergraphicsinprogress',$num_graphics_in_progress);
		$this->set('numbergraphicshold',$num_graphics_hold);
		$this->set('numbergraphicscompleted',$num_graphics_completed);
		
		$total_est_hours = $this->Aircraftsystem->Aircraftsystemgraphic->find('first', array(
				'conditions' => array('Aircraftsystemgraphic.aircraftsystem_id'=>$id),
				'fields' => array('sum(Aircraftsystemgraphic.graphic_estimated_hours) as total_sum'
				)
			)
		);
		$this->set('total_est_hours', $total_est_hours);
		
		$total_adj_hours = $this->Aircraftsystem->Aircraftsystemgraphic->find('first', array(
				'conditions' => array('Aircraftsystemgraphic.aircraftsystem_id'=>$id),
				'fields' => array('sum(Aircraftsystemgraphic.graphic_adj_estimated_hours) as total_sum'
				)
			)
		);
		$this->set('total_adj_hours', $total_adj_hours);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($aircrafttype_id = null) {
	    $this->Aircraftsystem->Aircrafttype->id = $aircrafttype_id;
		if (!$this->Aircraftsystem->Aircrafttype->exists()) {
			throw new NotFoundException(__('Invalid Aircraft Type'));
		}
		
		if ($this->request->is('post')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled addition.'));
			$this->redirect(array('controller'=>'Aircrafttypes','action' => 'view', $aircrafttype_id));
		}
			$this->request->data['Aircraftsystem']['aircrafttype_id'] = $aircrafttype_id;
			$this->Aircraftsystem->create();
			if ($this->Aircraftsystem->save($this->request->data)) {
				$this->Session->setFlash(__('The system has been saved'));
				$this->redirect(array('controller'=>'Aircrafttypes','action' => 'view', $aircrafttype_id));
			} else {
				$this->Session->setFlash(__('The system could not be saved. Please, try again.'));
			}
		}
		$aircrafttypes = $this->Aircraftsystem->Aircrafttype->find('list');
		$this->set(compact('aircrafttypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$aircrafttype_id = null) {
		if (!$this->Aircraftsystem->exists($id)) {
			throw new NotFoundException(__('Invalid System'));
		}
		$this->Aircraftsystem->Aircrafttype->id = $aircrafttype_id;
		
		if (!$this->Aircraftsystem->Aircrafttype->exists()) {
			throw new NotFoundException(__('Invalid Aircraft Type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->data['cancel']) {
			$this->Session->setFlash(__('User cancelled edit.'));
			$this->redirect(array('controller'=>'Aircrafttypes','action' => 'view', $aircrafttype_id));
		}
			if ($this->Aircraftsystem->save($this->request->data)) {
				$this->Session->setFlash(__('The system has been saved'));
				$this->redirect(array('controller'=>'Aircrafttypes','action' => 'view', $aircrafttype_id));
			} else {
				$this->Session->setFlash(__('The aircraftsystem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Aircraftsystem.' . $this->Aircraftsystem->primaryKey => $id));
			$this->request->data = $this->Aircraftsystem->find('first', $options);
		}
		$aircrafttypes = $this->Aircraftsystem->Aircrafttype->find('list');
		$this->set(compact('aircrafttypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Aircraftsystem->id = $id;
		if (!$this->Aircraftsystem->exists()) {
			throw new NotFoundException(__('Invalid aircraftsystem'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Aircraftsystem->delete()) {
			$this->Session->setFlash(__('Aircraftsystem deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aircraftsystem was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
