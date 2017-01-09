<?php
App::uses('AppController', 'Controller');

class MaquinasController extends AppController {
	public $components = array('Paginator', 'Session');
	public $paginate = array(
		'limit'=> 50,
		'order' => array('Maquina.nombre'=>'asc'),
		);
	
	public function isAuthorized($user=null){//solo permite al usuario de tipo user acceder a index y view
		if($user['role']=='user'){
			if(in_array($this->action,array('index','view'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'maquinas','action'=>'index'));
				}
			}
		return parent::isAuthorized($user);
	}
	
	public function index() {//funcion para acceder a index.ctp 
		$this->Paginator->settings = $this->paginate;
		$this->Maquina->recursive = 0;
		$this->set('maquinas', $this->Paginator->paginate());
	}
	
	public function add() {
		if ($this->request->is('post')) {//funcion para acceder a add.ctp 
			$this->Maquina->create();
			if ($this->Maquina->save($this->request->data)) {
				$this->Session->setFlash(__('Maquina guardada'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!. La Maquina no fue guardada, reintente.'));
			}
		}
	}
	
	public function edit($id = null) {
		if (!$this->Maquina->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($id==14) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->Maquina->id=$id;
		if ($this->request->is('get')) {
			$this->request->data= $this->Maquina->read();
			
		}
		else if ($this->request->is(array('post', 'put'))) {
			if ($this->Maquina->save($this->request->data)) {
				$this->Session->setFlash(__('Maquina guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!. Vuelva a intentar.'));
			}
		} else {
			$options = array('conditions' => array('Maquina.' . $this->Maquina->primaryKey => $id));
			$this->request->data = $this->Maquina->find('first', $options);
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
		$this->Maquina->id = $id;
		if (!$this->Maquina->exists()) {
			throw new NotFoundException(__('Maquina no existe'));
		}
		if ($id==1) {
			throw new NotFoundException(__('No puede eliminar a este Maquina, contacta al programador!! '));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Maquina->delete()) {
			$this->Session->setFlash(__('Maquina eliminado.'));
		} else {
			$this->Session->setFlash(__('Error!!. Vuelva a intentar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

