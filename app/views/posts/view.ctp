<div class="block_content grid_22 prefix_1 suffix_1">
    <article class="mb40">
        <header>
            <h2><?php echo $post['Post']['post_title']; ?></h2>
            <p><?php echo __('Posted by:',true).' '.$post['User']['username'].' | '.$post['Post']['post_date']; ?></p>
        </header>
        <a href="<?php echo Router::url('/'); ?>img/uploads/<?php echo $post['Post']['post_image']; ?>" class="colorbox">
			<?php
			if(!empty($post['Post']['post_image'])){
				echo $html->image("timthumb.php?src=uploads/".$post['Post']['post_image']."&h=117&w=192&zc=1",array('alt' => $post['Post']['post_title'], 'class' => 'alignleft'));   
			}
			?>
		</a>        
        <?php echo $post['Post']['post_content']; ?>
        
    </article>
</div><!-- /block_content -->