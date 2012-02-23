<header class="header">
    
    <?php echo $html->image("logo.png",array('alt' => 'SMAN 1 Tambun Selatan','class'=>'alignleft')); ?>
    
    <div class="overhidden">
        <h1 class="header_title">Adminpage PPDB</h1>
    </div>
    <div class="clear"></div>
</header>

<?php
    echo $this->Form->create('User', array('action' => 'login','class'=>'login_form'));
?>
<h2 class="login_title">LOGIN</h2>
<?php
    echo $this->Form->input('User.username',array('label'=>false,'placeholder'=>'Username','required'=>''));
    echo $this->Form->input('User.pwd',array('type'=>'password','label'=>false,'placeholder'=>'Password','required'=>''));
?>
<div class="remember">
<?php
    echo $this->Form->checkbox('User.remember_me');
?>
Remember me
</div>
<?php
    echo $this->Form->end('Enter',array('class'=>'btn_submit'));
?>