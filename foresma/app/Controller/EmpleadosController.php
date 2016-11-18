<?php
App::uses('AppController', 'Controller');

class EmpleadosController extends AppController{
	public $components = array('Paginator', 'Session');
	public $paginate = array(
		'limit'=> 50,
		'order' => array('Empleado.nombre'=>'asc'),
		);
		
	public function isAuthorized($user=null){
		if($user['role']=='user'){
			if(in_array($this->action,array('index','view'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'empleados','action'=>'index'));
				}
			}
		return parent::isAuthorized($user);
	}

	public function index(){
		$this->Paginator->settings = $this->paginate;
		$this->Empleado->recursive=0;
		$this->set('empleados', $this->Paginator->paginate());

	}
	public function add() {
		if ($this->request->is('post')) {
			$this->Empleado->create();
			if ($this->Empleado->save($this->request->data)) {
				$this->Session->setFlash(__('Empleado guardado'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!. El empleado no fue guardado, reintente.'));
			}
		}
	}
}
?>