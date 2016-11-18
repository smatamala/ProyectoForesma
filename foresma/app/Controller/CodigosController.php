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

 	public function isAuthorized($user=null){
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
		
	public function index() {
		$this->Codigo->recursive = 0;
		$this->set('codigos', $this->Paginator->paginate());
	}
	
		public function add() {
		if ($this->request->is('post')) {
			$this->Codigo->create();
			if ($this->Codigo->save($this->request->data)) {
				$this->Session->setFlash(__('El Codigo a sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error!!...El Codigo no pudo ser guardado, Re-Intente'));
			}
		}
	}
}