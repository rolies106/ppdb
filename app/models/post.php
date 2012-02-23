<?php

/**
 * Post model
 * @copyright 2011
 */

class Post extends AppModel {
    var $name = 'Post';
    var $belongsTo 	= array('User');
    //var $hasMany = array('RegistrationScore');

}

?>