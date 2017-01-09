<?php
App::uses('AppController', 'Controller');
/**
 * Codigos Controller
 *
 * @property Codigo $Codigo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CodigosController extends AppController {

	public $components = array('Paginator', 'Session');

 	public function isAuthorized($user=null){//solo permite al usuario de tipo user acceder a index y view
		if($user['role']=='user'){
			if(in_array($this->action,array('index','view'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'codigos','action'=>'index'));
				//$this->redirect($this->Auth->redirect($this->Auth->redirectURL('/produccions/index')));
				}
			}
		return parent::isAuthorized($user);
	}
		
	public function index() {//funcion que permite acceso a index.ctp
		$this->Codigo->recursive = 0;
		$this->set('codigos', $this->Paginator->paginate());
	}
	
		public function add() {//funcion que permite acceso a add.ctp
		if ($this->request->is('post')) {
			$this->Codigo->create();
			if ($this->Codigo->save($this->request->data)) {//si es posible almacenar en bd confirma 
				$this->Session->setFlash(__('El Codigo a sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!...El Codigo no pudo ser guardado, Re-Intente'));
			}
		}
	}
	
	public function edit($id = null) {
		if (!$this->Codigo->exists($id)) {
			throw new NotFoundException(__('Codigo no existe!!!'));
		}
		$this->Codigo->id=$id;
		if ($this->request->is('get')) {
			$this->request->data= $this->Codigo->read();
			
		}
		else if ($this->request->is(array('post', 'put'))) {
			if ($this->Codigo->save($this->request->data)) {
				$this->Session->setFlash(__('Codigo guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!. Vuelva a intentar.'));
			}
		} else {
			$options = array('conditions' => array('Codigo.' . $this->Codigo->primaryKey => $id));
			$this->request->data = $this->Codigo->find('first', $options);
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
		$this->Codigo->id = $id;
		if (!$this->Codigo->exists()) {
			throw new NotFoundException(__('Codigo no existe'));
		}
		if ($id==1) {
			throw new NotFoundException(__('No puede eliminar a este Codigo, contacta al programador!! '));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Codigo->delete()) {
			$this->Session->setFlash(__('Codigo eliminado.'));
		} else {
			$this->Session->setFlash(__('Error!!. Vuelva a intentar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}