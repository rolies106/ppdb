<?php

/**
 * registration controller
 * @copyright 2011
 */
 
class TestScoresController extends AppController {
    var $name = 'TestScores';

    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	
    function index(){
        $this->redirect(array('admin'=>true,'controller'=>'test_score','action'=>'updateNilaiTest'));
    }

    function admin_updateNilaiTest() {

        if ($this->RequestHandler->isAjax()) { 
            
            if ($this->TestScore->save($this->data)) { 
            
                $return['success'] = true;
                $return['id'] = $this->TestScore->id;
            
            } else {

                $return['success'] = false;

            } 

            echo json_encode($return);

            $this->autoRender = false;

            exit(); 

        }

    }
}