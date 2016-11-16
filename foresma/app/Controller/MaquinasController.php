<?php
App::uses('AppController', 'Controller');

class MaquinasController extends AppController {
	public $components = array('Paginator', 'Session');
	public $paginate = array(
		'limit'=> 50,
		'order' => array('Maquina.nombre'=>'asc'),
		);
	
	public function isAuthorized($user=null){
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
	
	public function index() {
		$this->Paginator->settings = $this->paginate;
		$this->Maquina->recursive = 0;
		$this->set('maquinas', $this->Paginator->paginate());
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Maquina->create();
			if ($this->Maquina->save($this->request->data)) {
				$this->Session->setFlash(__('Maquina guardada'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!. La Maquina no fue guardada, reintente.'));
			}
		}
	}
}

