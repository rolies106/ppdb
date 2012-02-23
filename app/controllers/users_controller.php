<?php

/**
 * users controller
 * @copyright 2011
 */
 
class usersController extends AppController {
    var $name = 'users';
    
    function login(){
        $this->layout = 'login';
        if(!empty($this->data)) {
            $this->data['User']['password'] = $this->Auth->password($this->data['User']['pwd']);
            if($this->Auth->login($this->data)){
                $this->redirect(array('admin'=>true,'controller'=>'users','action'=>'dashboard'));
            }                        
        }        
    }
    
    function logout(){
        $this->redirect($this->Auth->logout());
    }
    
    function admin_dashboard(){
        //debug($this->Auth->user());
        $this->loadModel('Registration');
        // set data statistic untuk calon siswa
        $data['jml_laki'] = $this->Registration->find('count',array('conditions'=>array('Registration.gender'=>'L')));
        $data['jml_perempuan'] = $this->Registration->find('count',array('conditions'=>array('Registration.gender'=>'P')));
        $data['gagal'] = $this->Registration->find('count',array('conditions'=>array('Registration.passed_by_register'=>0)));
        $data['lulus'] = $this->Registration->find('count',array('conditions'=>array('Registration.passed_by_register'=>1)));
        $data['total'] = $this->Registration->find('count');
        $this->set(compact('data'));
    }
    
    function admin_index(){
        $this->set('users', $this->User->find('all'));
    }
    
    function admin_add(){
        if(!empty($this->data)){
            $this->data['User']['register_date'] = date('Y-m-d H:i:s');
            $this->User->create();
            
            if($this->User->save($this->data)){
                $this->Session->setFlash('New user has been added.','flash_success');
                $this->redirect(array('admin'=>true,'controller'=>'users','action'=>'index'));
            }
        }
    }
    
    function admin_edit($id = null){
        $this->User->id = $id;
        if(empty($this->data)){
            $this->data = $this->User->read();
        }
        else{
            if(empty($this->data['User']['secretword']) && empty($this->data['User']['resecretword'])){
                unset($this->data['User']['secretword']);
                unset($this->data['User']['resecretword']);
            }
            if($this->User->save($this->data)){
                $this->Session->setFlash('User has been updated.','flash_success');
                $this->redirect(array('admin'=>true,'controller'=>'users','action'=>'index'));
            }
        }    
    }
    
    function admin_delete($id) {
    	if ($this->User->delete($id)) {
    		$this->Session->setFlash('User with id: ' . $id . ' has been deleted.','flash_success');
    		$this->redirect(array('admin'=>true,'controller'=>'users','action'=>'index'));
    	}
    }
}