<?php
class FaenasController extends AppController{
	public $paginate = array(
		'limit'=> 10,
		'order' => array('Faena.id'=>'asc')
		);
	public function index(){
		$this->Faena->recursive=0;
		$this->set('faenas',$this->paginate());

	}
	public function isAuthorized($user){
			if($user['role']=='admin'){
				if(in_array($this->action,array('add','index','view'))){
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
	public function add(){
		if($this->request->is('post')):
			if($this->Faena->save($this->request->data)):
				$this->Session->setFlash('Faena guardado');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
	}

	public function view($id = null){
		if (!$id)
		{
			throw new NotFoundException('Datos Invalidos');
		}
		$faena = $this->Faena->findById($id);

		if (!$faena)
		{
			throw new NotFoundException('La faena no existe');
		}

		$this->set('faena', $faena);
	}
	

}
?>