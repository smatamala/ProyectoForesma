<?php
class FaenasController extends AppController{
	public $paginate = array(
		'limit'=> 10,
		'order' => array('Faena.id'=>'asc')
		);
	public function index(){//funcion para acceder a index.ctp que trae lista de empleados desde la bd
		$this->Faena->recursive=0;
		$this->set('faenas',$this->paginate());
		$users=$this->Faena->User->find('list',array('order'=>'User.username'));
		$this->set(compact('users'));

	}
	public function isAuthorized($user){//solo permite al usuario de tipo user acceder a index y view
			if($user['role']=='user'){
				if(in_array($this->action,array('index','view'))){
					return true;
				}
				else{
					if($this->Auth->user('id')){
						$this->Session->$this->Session->setFlash('No puede acceder', 'default', array('class'=>'alert alert-danger'));
						$this->redirect($this->Auth->redirect());
					}
				}
			}
			return parent::isAuthorized($user);
		}
	public function add(){//funcion para acceder a add.ctp 
		if($this->request->is('post')):
			if($this->Faena->save($this->request->data)):
				$this->Session->setFlash('Faena guardado');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
		$users=$this->Faena->User->find('list',array('order'=>'User.username'));
		$this->set(compact('users'));
	}


	public function view($id = null){//funcion para acceder a view.ctp
		if (!$id){
			$this->Session->setFlash(__('Datos invalidos'));
			$this->redirect(array('action'=>'index'));
		}
		$faena = $this->Faena->findById($id);

		if (!$faena){
			$this->Session->setFlash(__('La faena no existe'));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('faena', $faena);
		$this->loadModel('Empleado');
		$empleados=$this->Empleado->find('all');
		$this->set('empleados',$empleados);
		
		
	}
	

}
?>