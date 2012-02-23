<?php

/**
 * Mata pelajaran model
 * @copyright 2011
 */

class RegistrationScore extends AppModel {
    var $name = 'RegistrationScore';
    var $belongsTo = array('Registration','Mapel');
    
    var $validate = array(
        'semester_1' => array(
            'rule' => 'numeric'
        ),
        'semester_2' => array(
            'rule' => 'numeric'
        ),
        'semester_3' => array(
            'rule' => 'numeric'
        ),
        'semester_4' => array(
            'rule' => 'numeric'
        ),
        'semester_5' => array(
            'rule' => 'numeric'
        )
    );
}

?>