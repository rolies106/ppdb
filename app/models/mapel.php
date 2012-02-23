<?php

/**
 * Mata pelajaran model
 * @copyright 2011
 */

class Mapel extends AppModel {
    var $name = 'Mapel';
    var $hasMany = array('RegistrationScore');
}

?>