<?php

/**
 * Option model
 * @copyright 2011
 */

class Option extends AppModel {
    var $name = 'Option';
    //var $hasMany = array('RegistrationScore');
    
    function insertValue($name, $value = NULL, $type = null) {    
        if (!empty($name)) {
            $checkData = $this->find('first', array('conditions' => array('option_name' => $name)));
            
            if(empty($checkData)) {
                $this->save(array('option_name' => $name, 'option_value' => $value, 'id' => NULL, 'option_type' => $type));   
            } else {
                $this->save(array('option_name' => $name, 'option_value' => $value, 'id' => $checkData['Option']['id'], 'option_type' => $type));
            }
        }
    }
    
    function getValue($name = NULL) {
        if (!empty($name)) {
            $data = $this->find('first', array('conditions' => array('option_name' => $name)));
            return $data['Option']['option_value'];
        }
    }
}

?>