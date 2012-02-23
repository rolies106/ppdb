<h2><?php __('Edit user')?></h2>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('User.id', array('type'=>'hidden'));
?>
<div class="input select">
<label><?php __('User Type:')?></label>
<?php
    echo $this->Form->select('User.level',array('1' =>'Super Admin'),array('empty'=>'1'));
?>
</div>
<div class="input select">
<label><?php __('Status:')?></label>
<?php
    echo $this->Form->select('User.status',array('1' =>'Active', '0' => 'Not active'),array('empty'=>'1'));
?>
</div>
<?php
    echo $this->Form->input('User.username', array('label' => __('Username',true)));
    echo $this->Form->input('User.email', array('label' => __('Email',true)));
    echo $this->Form->input('User.secretword', array('type' => 'password','label' => __('Password',true)));
    echo $this->Form->input('User.resecretword', array('type' =>'password','label' => __('Retype Password',true)));
?>
<div class="input">
    <span><?php __('* Apabila password tidak diganti dikosongkan saja')?></span>
</div>
<?php
    echo $this->Form->end('Save');
?>