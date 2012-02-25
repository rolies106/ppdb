<?php
    echo $this->Form->input('User.username', array('label' => __('Username',true), 'class' => 'field titleHintBox', 'title'=>'Hanya karakter huruf, angka, dan garis bawah (underscore)'));
    echo $this->Form->hidden('User.email', array('label' => __('Email',true), 'class' => 'field', 'readonly' => 'readonly'));
    echo $this->Form->input('User.secretword', array('type' => 'password','label' => __('Password',true), 'class' => 'field'));
    echo $this->Form->input('User.resecretword', array('type' =>'password','label' => __('Retype Password',true), 'class' => 'field'));
?>