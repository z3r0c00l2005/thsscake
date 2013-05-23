<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect(array('controller' => 'aircrafttypes', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this->Session->delete('Alaxos.Acl.permissions');
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	
	
	
	public function initDB() {
		//Administrators
		$this->Acl->allow('Group::Administrators', 'controllers');

		//allow managers to posts and widgets
		$this->Acl->deny('Group::Managers', 'controllers');
		$this->Acl->allow('Group::Managers', 'controllers/Aircrafttypes/index');
		$this->Acl->allow('Group::Managers', 'controllers/Aircrafttypes/view');
	/*	$this->Acl->allow($group, 'controllers/Aircraftsystems');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphics');
		$this->Acl->allow($group, 'controllers/Aircraftsystemcomments');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicbookings');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicscomments');
		$this->Acl->allow($group, 'controllers/Uploads');
		
		//allow users to only add and edit on posts and widgets
		$group->id = 10;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Aircrafttypes');
		$this->Acl->allow($group, 'controllers/Aircraftsystems');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphics');
		$this->Acl->allow($group, 'controllers/Aircraftsystemcomments');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicbookings');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicscomments');
		$this->Acl->allow($group, 'controllers/Uploads');
		
		$group->id = 11;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Aircrafttypes');
		$this->Acl->allow($group, 'controllers/Aircraftsystems');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphics');
		$this->Acl->allow($group, 'controllers/Aircraftsystemcomments');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicbookings');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicscomments');
		$this->Acl->allow($group, 'controllers/Uploads');
		
		
		$group->id = 12;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Aircrafttypes');
		$this->Acl->allow($group, 'controllers/Aircraftsystems');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphics');
		$this->Acl->allow($group, 'controllers/Aircraftsystemcomments');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicbookings');
		$this->Acl->allow($group, 'controllers/Aircraftsystemgraphicscomments');
		$this->Acl->allow($group, 'controllers/Uploads');
		//$this->Acl->allow($group, 'controllers/Widgets/edit');
		*/
		//we add an exit to avoid an ugly "missing views" error message
		echo "all done";
		exit;
	}
		
	
	
	
	
}
