<?php

/**
 * User model
 * @copyright 2011
 */

class User extends AppModel {
    var $name = 'User';
    var $hasMany = array('Post');
    
    var $validate = array(
        'level' => array(
            'rule' => 'notEmpty',
            'message' => 'Level user harus diisi'
        ),
        'status' => array(
            'rule' => 'notEmpty',
            'message' => 'Status harus diisi'
        ),
        'username' => array(
            'rule' => 'notEmpty',
            'message' => 'Username harus diisi'
        ),
        'email' => array(
            'rule' => array('email',true),
            'message' => 'Masukan valid email address'
        ),
        'secretword' => array(
            'rule' => array('minLength',6),
            'allowEmpty'=> false,
            'message' 	=> 'Password harus diisi dan minimal 6 characters'
        ),
        'resecretword' => array(
            'rule'		=> 'matchPwd',
            'message'	=> 'Confirmation password tidak cocok'
        )
    );
    
    function beforeSave() {
		if(!empty($this->data) && isset($this->data['User']['secretword']) && $this->data['User']['secretword'] != null) {
			$this->data['User']['password'] = Security::hash($this->data['User']['secretword'],null,true);
		}
		return true;
	}
    
    function matchPwd() {
		if($this->data['User']['secretword'] == $this->data['User']['resecretword']) {
			return true;
		}else {
			return false;
		}
	}
}

?>