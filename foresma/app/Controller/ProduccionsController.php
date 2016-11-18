<?php
App::uses('AppController', 'Controller');

class ProduccionsController extends AppController{
	public $helpers =array ('Html','Form','Time');
	public $components =array ('Paginator','Session');
	public $paginate = array(
        'limit' => 100,
        'order' => array('Produccion.id' => 'desc')
    );


	
	public function index(){
        $this->Paginator->settings = $this->paginate;
		$this->Produccion->recursive=0;
		$this->set('produccions',$this->Paginator->paginate());
	}
	
	public function isAuthorized($user=null){
		if($user['role']=='user'){
			if(in_array($this->action,array('add','index','view','viewdia'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'produccions','action'=>'index'));

				}
			}
		if($user['role']=='view'){
			if(in_array($this->action,array('index','view','viewdia','viewmes'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'produccions','action'=>'index'));

				}
			}
		return parent::isAuthorized($user);
	}
	
	
	
}