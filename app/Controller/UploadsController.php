<?php
App::uses('AppController', 'Controller');
/**
 * Uploads Controller
 *
 * @property Upload $Upload
 */
class UploadsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
		$this->set('upload', $this->Upload->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($uploadsource = null, $uploadsourceid = null) {
	$this->Upload->uploadsource = $uploadsource;
	$this->Upload->uploadsourceid = $uploadsourceid;
		if ($this->request->is('post')) {

		if (!$this->data['submit']) {
			$this->Session->setFlash(__('User cancelled addition.'));
			$this->redirect(array('controller'=>$uploadsource,'action' => 'view', $uploadsourceid));
		}
				$this->request->data['Upload']['uploadsource'] = $uploadsource;
				$this->request->data['Upload']['uploadsourceid'] = $uploadsourceid;
			$this->Upload->create();
			if ($this->uploadFile() && $this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The attachment has been saved'));
			//	$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller'=>$uploadsource,'action' => 'view', $uploadsourceid));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
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
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
			$this->request->data = $this->Upload->find('first', $options);
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
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Upload->delete()) {
			$this->Session->setFlash(__('Upload deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	function uploadFile() {
		$file = $this->data['Upload']['file'];
		if ($file['error'] === UPLOAD_ERR_OK) {
			$id = String::uuid();
			if (move_uploaded_file($file['tmp_name'], APP.'uploads'.DS.$id)) {
			$this->request->data['Upload']['id'] = $id;
			//$this->data['Upload']['user_id'] = $this->Auth->user('id');
			$this->request->data['Upload']['filename'] = $file['name'];
			$this->request->data['Upload']['filesize'] = $file['size'];
			$this->request->data['Upload']['filemime'] = $file['type'];
			return true;
			}
		}
	return false;
}


/**
 * Sends a file to the client
 *
 * @param string $id UUID
 * @access public
 */
	public function download($id = null) {
		$media = $this->Upload->read(null, $id);
		$filepath = APP . 'Uploads' . DS . $id;
		if (!file_exists($filepath)) {
			$this->Session->setFlash(__('Error! File Does Not Exist!'));
			$this->redirect(array('action' => 'index'));
		}
 		$this->autoRender = false;
		$this->response->type($media['Upload']['filemime']);
		$this->response->file($filepath, array('download' => true, 'name' => $media['Upload']['filename']));
	}



}
