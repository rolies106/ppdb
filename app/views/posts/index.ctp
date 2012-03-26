<?php #$javascript->link('mylibs/jquery.easing.1.3', false); ?>
<?php #$javascript->link('mylibs/jquery.carouFredSel-3.2.0', false); ?>
<?php $javascript->link('mylibs/jquery.nivo.slider.pack', false); ?>
<?php $javascript->link('home/application', false); ?>
        
        <?php if(!empty($features)): ?>
        
        <div class="top_container relative top-border-radius css3pie">
            <div class="slider-wrapper theme-pascal">
                <div id="myslider" class="nivoSlider">
                    <?php foreach($features as $feature): ?>
                        <a href="<?php echo Router::url('/'); ?>posts/view/<?php echo $feature['Post']['id']; ?>" class="">
                            <?php 
                            if(!empty($feature['Post']['post_image'])){ # h=284
                                echo $html->image("timthumb.php?src=uploads/".$feature['Post']['post_image']."&h=235&w=934&zc=1",array('alt' => $feature['Post']['post_title'], 'title' => $feature['Post']['post_title']));
                            }
                            ?>
                        </a>
                    <?php endforeach; ?>    
                </div>
            </div>
        <div class="clear"></div>
        </div><!-- /top_container -->
        
        <?php endif; ?>
        
        <div class="block_content grid_22 prefix_1 suffix_1">
            
            <div class="post_wrapper border-radius">
                <legend class="phm"><h2><?php echo __('Berita Terakhir'); ?></h2></legend>
                <div class="clear"></div>
                <div class="grid_10 posts_home mrl">
                    <?php if(!empty($latestpost)): ?>
                    
                    <article class="mb40">
                        <header>
                            <h2>
                                <?php echo $this->Html->link($latestpost['Post']['post_title'],array('admin'=>false,'controller'=>'posts','action'=>'view',$latestpost['Post']['id']),array('class'=>'')); ?>
                            </h2>
                        </header>
                        
                        <a href="<?php echo Router::url('/'); ?>img/uploads/<?php echo $latestpost['Post']['post_image']; ?>" class="colorbox">
                            <?php
                            if(!empty($latestpost['Post']['post_image'])){
                                echo $html->image("timthumb.php?src=uploads/".$latestpost['Post']['post_image']."&h=117&w=192&zc=1",array('alt' => $latestpost['Post']['post_title'], 'class' => 'alignleft'));   
                            }
                            ?>
                        </a>
                        <?php echo substr(strip_tags($latestpost['Post']['post_content']), 0, 500) . '...'; ?>
                        
                        <footer>
                            <?php echo $this->Html->link(__('read more...',true),array('admin'=>false,'controller'=>'posts','action'=>'view',$latestpost['Post']['id']),array('class'=>'link_more fsize14 css3pie relative')); ?>
                        </footer>
                    </article>
                    
                    <?php else: ?>
                    
                    <article>
                        <header>
                            <h2><?php __('Tidak ada posts ditemukan')?></h2>
                        </header>
                    </article>
                    
                    <?php endif; ?>            
                </div>
                <div class="grid_10 posts_home mll">
                    <?php if(!empty($posts)): ?>

                        <header>
                            <h2><?php echo __('Berita Lainnya'); ?></h2>
                        </header>
                    
                        <ul class="posts_list">
                            <?php foreach($posts as $post): ?>
                                <li class="mbs">
                                    <?php echo $this->Html->link(__($post['Post']['post_title'],true),array('admin'=>false,'controller'=>'posts','action'=>'view',$post['Post']['id']),array('class'=>'fsize14')); ?>
                                </li>                            
                            <?php endforeach; ?>
                        </ul>

                    <?php else: ?>
                    
                    <article>
                        <header>
                            <h2><?php __('Tidak ada posts ditemukan')?></h2>
                        </header>
                    </article>
                    
                    <?php endif; ?>
                </div>
                <div class="clear"></div>
            </div>
        </div><!-- /block_content -->