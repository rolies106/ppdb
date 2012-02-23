<?php $javascript->link('ckeditor/ckeditor', false); ?>

<div class="grid_24">
<?php
    echo $this->Form->create('Post',array('enctype'=>'multipart/form-data'));
    echo $this->Form->input('Post.post_title', array('label'=>__('Title',true)));
?>
<div class="input select">
<label><?php __('Post Type:')?></label>
<?php
    echo $this->Form->select('Post.post_type',array('post' =>'Post','feature'=>'Feature'),array('empty'=>'post'));
?>
</div>
<div class="input select">
<label><?php __('Publish:')?></label>
<?php
    echo $this->Form->select('Post.publish',array('Y' =>'Yes','N'=>'No'),array('empty'=>'Y'));
?>
</div>
<?php    
    echo $this->Form->input('Post.post_content',array('label'=>__('Content',true),'class'=>'ckeditor'));
?>
<div class="input file">
<label><?php __('Insert Post Image Thumbnail')?></label>
<?php
    echo $this->Form->file('Post.post_image');
?>
</div>
<?php    
    echo $this->Form->end('Save Post');
?>
</div>
<div class="clear"></div>