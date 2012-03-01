<div class="block_content grid_22 prefix_1 suffix_1">
    <?php echo $this->Session->flash('auth'); ?>
    <br/>
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
</div>