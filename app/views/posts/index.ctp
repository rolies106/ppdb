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
                                echo $html->image("timthumb.php?src=uploads/".$feature['Post']['post_image']."&h=300&w=958&zc=1",array('alt' => $feature['Post']['post_title'], 'title' => $feature['Post']['post_title']));
                            }
                            ?>
                        </a>
                    <?php endforeach; ?>    
                </div>
            </div>
        <div class="clear"></div>
        </div><!-- /top_container -->
        
        <?php endif; ?>
        
        <div class="block_content grid_24">

            <div class="grid_8 posts_home mlm mrm">

                <header>
                    <h2><?php echo __('Berita'); ?></h2>
                </header>
                                
                <?php if(!empty($posts)): ?>
                
                    <article class="mb40">
                        <ul class="posts_list">
                            <?php foreach($posts as $post): ?>
                                <li class="mbs">
                                    <?php
                                        if(!empty($post['Post']['post_image'])){ # h=284
                                            echo $html->image("timthumb.php?src=uploads/".$post['Post']['post_image']."&h=60&w=60&zc=1",array('alt' => $post['Post']['post_title'], 'title' => $post['Post']['post_title']));
                                        } else {
                                            echo $html->image("timthumb.php?src=no_img.jpg&h=60&w=60&zc=1",array('alt' => $post['Post']['post_title'], 'title' => $post['Post']['post_title']));
                                        }
                                    ?>
                                    <div class="post_text">
                                        <?php echo $this->Html->link(__($post['Post']['post_title'],true),array('admin'=>false,'controller'=>'posts','action'=>'view',$post['Post']['id']),array('class'=>'title')); ?>
                                        <?php echo substr(strip_tags($post['Post']['post_content']), 0, 120) . '...'; ?>
                                        <?php echo $this->Html->link(__('more',true),array('admin'=>false,'controller'=>'posts','action'=>'view',$post['Post']['id']),array('class'=>'')); ?>
                                    </div>

                                    <div class="clear"></div>
                                </li>                            
                            <?php endforeach; ?>
                        </ul>
                        
                    </article>
                
                <?php else: ?>
                
                    <article>
                        <header>
                            <h3><?php __('Tidak ada posts ditemukan')?></h3>
                        </header>
                    </article>
                
                <?php endif; ?>            
            </div>
            <div class="grid_8 posts_home mlm mrm">
                <header>
                    <h2><?php echo __('Seputar PPDB'); ?></h2>
                </header>
                                
                <?php if(!empty($ppdbposts)): ?>
                
                    <article class="mb40">
                        <ul class="posts_list">
                            <?php foreach($ppdbposts as $post): ?>
                                <li class="mbs">
                                    <?php
                                        if(!empty($post['Post']['post_image'])){ # h=284
                                            echo $html->image("timthumb.php?src=uploads/".$post['Post']['post_image']."&h=60&w=60&zc=1",array('alt' => $post['Post']['post_title'], 'title' => $post['Post']['post_title']));
                                        } else {
                                            echo $html->image("timthumb.php?src=no_img.jpg&h=60&w=60&zc=1",array('alt' => $post['Post']['post_title'], 'title' => $post['Post']['post_title']));
                                        }
                                    ?>
                                    <div class="post_text">
                                        <?php echo $this->Html->link(__($post['Post']['post_title'],true),array('admin'=>false,'controller'=>'posts','action'=>'view',$post['Post']['id']),array('class'=>'title')); ?>
                                        <?php echo substr(strip_tags($post['Post']['post_content']), 0, 120) . '...'; ?>
                                        <?php echo $this->Html->link(__('more',true),array('admin'=>false,'controller'=>'posts','action'=>'view',$post['Post']['id']),array('class'=>'')); ?>
                                    </div>

                                    <div class="clear"></div>
                                </li>                            
                            <?php endforeach; ?>
                        </ul>
                        
                    </article>
                
                <?php else: ?>
                
                    <article>
                        <header>
                            <h3><?php __('Tidak ada posts ditemukan')?></h3>
                        </header>
                    </article>
                
                <?php endif; ?>  
            </div>
            <div class="grid_7 posts_home mlm mrm">
                <div class="contact">
                    <header>
                        <h2>Hubungi Kami</h2>
                    </header>
                    <ul>
                        <?php if ($options['no_telp']): ?>
                            <li>Telp. <?php echo $options['no_telp']; ?></li>
                        <?php endif; ?>
                        <?php if ($options['no_telp']): ?>
                            <li>Faks. <?php echo $options['no_faks']; ?></li>
                        <?php endif; ?>
                        <?php if ($options['email']): ?>
                            <li>Email. <a href="mailto:<?php echo $options['email']; ?>"><?php echo $options['email']; ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <?php if ($options['social_twitter']): ?>
                <div class="tweet-cont">
                    <img src="img/bg-tweet.png" />
                    <h2>Apa yang kami katakan?</h2>
                    <div id="last-tweet">Tunggu update terbaru dari kami.</div>
                </div>
                <?php endif; ?>
            </div>
            <div class="clear"></div>

        </div><!-- /block_content -->
<script type="text/javascript">
    <?php if ($options['social_twitter']): ?>
        var TWITTER = "<?php echo $options['social_twitter']; ?>";
    <?php endif; ?>    
</script>