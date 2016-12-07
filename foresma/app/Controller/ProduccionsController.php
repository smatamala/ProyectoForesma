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
			if(in_array($this->action,array('add','index','view'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'produccions','action'=>'index'));

				}
			}
		if($user['role']=='view'){
			if(in_array($this->action,array('index','view'))){
				return true;
			}
			else{
				$this->Session->setFlash('No puede acceder, NO TIENES PERMISOS!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('controller' =>'produccions','action'=>'index'));

				}
			}
		return parent::isAuthorized($user);
	}
	
	public function add($faena=null,$empleado=null){
		$empleados=$this->Produccion->Empleado->find('list',array('order'=>'Empleado.nombre'));
		$this->set(compact('empleados'));
		if($this->request->is('post')):
			if($this->Produccion->save($this->request->data)):
				$this->Session->setFlash('Produccion agregada');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
		
		$maquinas=$this->Produccion->Maquina->find('list',array('order'=>'Maquina.nombre'));
		$this->set(compact('maquinas'));
		$this->loadModel('Faena');
		$faenas=$this->Faena->find('list',array('order'=>'Faena.nombre'));
		$this->set(compact('faenas'));

		$this->loadModel('Codigo');
		$codigos=$this->Codigo->find('list',array('order'=>'Codigo.codigo'));
		$this->set('codigos',$codigos);
		
		$this->loadModel('Insumo');
		$insumos=$this->Insumo->find('list',array('order'=>'Insumo.nombre'));
		$this->set('insumos',$insumos);
	}
	
	public function dashboard(){
        $this->Paginator->settings = $this->paginate;
		$this->Produccion->recursive=0;
		$this->set('produccions',$this->Paginator->paginate());
		$this->loadModel('Faena');
		$faenas=$this->Faena->find('all',array('order'=>'Faena.nombre'));
		$this->set(compact('faenas'));
		$this->loadModel('Empleado');
		$empleados=$this->Produccion->Empleado->find('all',array('order'=>'Empleado.nombre'));
		$this->set(compact('empleados'));
	}
	
	public function view($id = null){
		if (!$id){
			throw new NotFoundException('Datos Invalidos');
		}
		$produccion = $this->Produccion->findById($id);

		if (!$produccion){
			throw new NotFoundException('La produccion no existe');
		}
		$this->set('produccion', $produccion);
		$this->loadModel('Empleado');
		$empleado=$this->Empleado->find('all');
		$this->set('empleado', $empleado);
		
	}
	
	public function delete($id = null,$username = null) {
		function write_log($cadena){
			$arch = fopen("../../logs/deletes".".txt", "a+"); //date("Y-m-d"). define hora en archivo
		
			fwrite($arch, "[".date("Y-m-d H:i:s")." ".$_SERVER['REMOTE_ADDR']." "." - Elimino produccion ] ".$cadena."\n");
			fclose($arch);
		}
		$this->Produccion->id = $id;
		if (!$this->Produccion->exists()) {
			$this->Session->setFlash(__('Produccion invalida, No Existe!'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Produccion->delete()) {
			$this->Session->setFlash(__('La Produccion a sido eliminada correctamente.'));
			write_log("usuario:". $username . " elimino: ".$id." ");
		} else {
			$this->Session->setFlash(__('La Produccion no se pudo eliminar, Vuelva a intentarlo!.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	
}