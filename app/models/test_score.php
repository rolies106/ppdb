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
}

?>