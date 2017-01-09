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
}