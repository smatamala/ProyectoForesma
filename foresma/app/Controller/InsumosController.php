<?php
App::uses('AppController', 'Controller');
/**
 *Insumos Controller
 *
 * @property Insumo Insumo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InsumosController extends AppController {

	public $components = array('Paginator', 'Session');

 	public function isAuthorized($user=null){//permisos de acceso solo a index y view para user
		if($user['role']=='user'){
			if(in_array($this->action,array('index','view'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'insumos','action'=>'index'));
				//$this->redirect($this->Auth->redirect($this->Auth->redirectURL('/produccions/index')));
				}
			}
		return parent::isAuthorized($user);
	}
	public function index() {//funcion para acceder a indes.ctp
		$this->Insumo->recursive = 0;
		$this->set('insumos', $this->Paginator->paginate());
	}

	public function add() {//funcion para acceder a add.ctp
		if ($this->request->is('post')) {
			$this->Insumo->create();
			if ($this->Insumo->save($this->request->data)) {
				$this->Session->setFlash(__('El Insumo fue guardado'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!...El Insumo no pudo ser guardado, Re-Intente'));
			}
		}
	}
	
	public function edit($id = null) {
		if (!$this->Insumo->exists($id)) {
			throw new NotFoundException(__('Insumo no existe!!!'));
		}
		$this->Insumo->id=$id;
		if ($this->request->is('get')) {
			$this->request->data= $this->Insumo->read();
			
		}
		else if ($this->request->is(array('post', 'put'))) {
			if ($this->Insumo->save($this->request->data)) {
				$this->Session->setFlash(__('Insumo guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!. Vuelva a intentar.'));
			}
		} else {
			$options = array('conditions' => array('Insumo.' . $this->Insumo->primaryKey => $id));
			$this->request->data = $this->Insumo->find('first', $options);
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
		$this->Insumo->id = $id;
		if (!$this->Insumo->exists()) {
			throw new NotFoundException(__('Insumo no existe'));
		}
		if ($id==1) {
			throw new NotFoundException(__('No puede eliminar a este Insumo, contacta al programador!! '));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Insumo->delete()) {
			$this->Session->setFlash(__('Insumo eliminado.'));
		} else {
			$this->Session->setFlash(__('Error!!. Vuelva a intentar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}