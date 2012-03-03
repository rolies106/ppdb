<?php

/**
 * Test Score model
 * @copyright 2011
 */

class TestScore extends AppModel {
    var $name = 'TestScore';
    var $belongsTo = array('Registration');
    
    var $validate = array(
        'academic' => array(
            'rule' => 'numeric'
        ),
        'english' => array(
            'rule' => 'numeric'
        ),
        'computer' => array(
            'rule' => 'numeric'
        ),
        'interview' => array(
            'rule' => 'numeric'
        ),
        'uasbn' => array(
            'rule' => 'numeric'
        )
    );

    function persentaseNilai() {
        $array = array('academic' => 0.4,
                       'english' => 0.1,
                       'computer' => 0.1,
                       'interview' => 0.05,
                       'uasbn' => 0.35);
        
        return $array;
    }
}

?>