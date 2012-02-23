<?php $javascript->link('mylibs/jquery.easing.1.3', false); ?>
<?php $javascript->link('mylibs/jquery.carouFredSel-3.2.0', false); ?>
<?php $javascript->link('home/application', false); ?>
        
        <?php if(!empty($features)): ?>
        
        <div class="top_container relative top-border-radius css3pie">
            
            <ul id="home_slider" class="menu-slider">
                
                <?php foreach($features as $feature): ?>
                <li>        
                <div class="grid_13">
                    <h1 class="fsize30 mtm"><?php echo $feature['Post']['post_title']; ?></h1>
                    
                    <?php echo $feature['Post']['post_content']; ?>
                    
                    <div class="nav_btn_container ptm">
                        <div class="btn_blue left">
                            <a href="<?php echo Router::url(array('admin'=>false,'controller'=>'registrations','action'=>'add')) ?>"><span class="checklist-ico"></span>Daftar Sekarang</a>
                        </div>
                        <div class="left">
                            <p class="fsize11 mtm mlm"><?php __('Bergabung di Sekolah bertaraf Internasional'); ?></p>
                        </div>
                    </div><!-- /nav_btn_container -->
                </div>
                <div class="grid_9 prefix_1 alpha omega">
					<a href="<?php echo Router::url('/'); ?>img/uploads/<?php echo $feature['Post']['post_image']; ?>" class="colorbox">
						<?php 
						if(!empty($feature['Post']['post_image'])){ # h=284
							echo $html->image("timthumb.php?src=uploads/".$feature['Post']['post_image']."&h=&w=345&zc=1",array('alt' => $feature['Post']['post_title']));   
						}
						?>
					</a>
                </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="clear"></div>
            <a class="caro-prev" id="prev_btn" href="#"><span>prev</span></a>
            <a class="caro-next" id="next_btn" href="#"><span>next</span></a>
            
        </div><!-- /top_container -->
        
        <?php endif; ?>
        
        <div class="block_content grid_22 prefix_1 suffix_1">
            
            <?php if(!empty($posts)): ?>
            
            <?php foreach($posts as $post): ?>
            
            <article class="mb40">
                <header>
                    <h2><?php echo $post['Post']['post_title']; ?></h2>
                </header>
                
				<a href="<?php echo Router::url('/'); ?>img/uploads/<?php echo $post['Post']['post_image']; ?>" class="colorbox">
					<?php
					if(!empty($post['Post']['post_image'])){
						echo $html->image("timthumb.php?src=uploads/".$post['Post']['post_image']."&h=117&w=192&zc=1",array('alt' => $post['Post']['post_title'], 'class' => 'alignleft'));   
					}
					?>
                </a>
                <?php echo $post['Post']['post_content']; ?>
                
                <footer>
                    <?php echo $this->Html->link(__('read more...',true),array('admin'=>false,'controller'=>'posts','action'=>'view',$post['Post']['id']),array('class'=>'link_more fsize14 css3pie relative')); ?>
                </footer>
            </article>
            
            <?php endforeach; ?>
            
            <?php else: ?>
            
            <article>
                <header>
                    <h2><?php __('Tidak ada posts ditemukan')?></h2>
                </header>
            </article>
            
            <?php endif; ?>
        </div><!-- /block_content -->