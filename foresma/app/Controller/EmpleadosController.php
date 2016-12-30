<?php
App::uses('AppController', 'Controller');

class EmpleadosController extends AppController{
	public $components = array('Paginator', 'Session');
	public $paginate = array(
		'limit'=> 50,
		'order' => array('Empleado.nombre'=>'asc'),
		);
		
	public function isAuthorized($user=null){//solo permite al usuario de tipo user acceder a index y view
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

	public function index(){//funcion para acceder a index.ctp que trae lista de empleados desde la bd
		$this->Paginator->settings = $this->paginate;
		$this->Empleado->recursive=0;
		$this->set('empleados', $this->Paginator->paginate());

	}
	public function add() {//funcion para acceder a add.ctp 
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
	public function view($id = null){// permite acceso a la vista de los empleados donde se muestra la info de un empleados espesifico
		if (!$id)
		{
			throw new NotFoundException('Datos Invalidos');
		}
		$empleado = $this->Empleado->findById($id);
		$this->loadModel('Faena');
		$faenas= $this->Faena->find('list');
		if (!$empleado)
		{
			throw new NotFoundException('El empleado no existe');
		}

		$this->set('empleado', $empleado,$this->Paginator->paginate());
		$this->set('faenas',$faenas);
		$this->set('id',$id);
	}
}
?>