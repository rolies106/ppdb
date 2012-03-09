<div class="block_content grid_22 prefix_1 suffix_1">
    
    <div class="message fsize14 mb40 <?php echo ($pass == 1) ? 'success' : 'failed';?>">
        <?php echo $msg; ?>
    </div>
    
    <?php if($pass == 1): ?>
    
    <h2 class="helvetica">
        <?php __('Cetak Document')?>
    </h2>
    
    <div class="grid_3 prefix_1 mb40">
        <?php echo $html->image("print_media.jpg",array('alt' => 'print')); ?>
    </div>
    <div class="grid_11 prefix_1 inner-border-radius box_shadow css3pie relative">
        <?php echo $this->Html->link(__('Print/Cetak Formulir Pendaftaran',true),array('controller'=>'registrations','action'=>'cetakDocPendaftaran'),array('class'=>'share_link size24', 'target' => '_blank')); ?>
    </div>
    <div class="clear"></div>
    
    <div class="grid_3 prefix_1 mb40">
        <?php echo $html->image("print_media.jpg",array('alt' => 'print')); ?>
    </div>
    <div class="grid_11 prefix_1 inner-border-radius box_shadow css3pie relative">
        <?php echo $this->Html->link(__('Print/Cetak Surat Pernyataan',true),array('controller'=>'registrations','action'=>'cetakDocPernyataan'),array('class'=>'share_link size24', 'target' => '_blank')); ?>
    </div>
    <div class="clear"></div>
    
    <div class="grid_3 prefix_1 mb40">
        <?php echo $html->image("print_media.jpg",array('alt' => 'print')); ?>
    </div>
    <div class="grid_11 prefix_1 inner-border-radius box_shadow css3pie relative">
        <?php echo $this->Html->link(__('Print/Cetak Nilai Raport',true),array('controller'=>'registrations','action'=>'cetakDocNilai'),array('class'=>'share_link size24', 'target' => '_blank')); ?>
    </div>
    <div class="clear"></div>
    
    <div class="grid_3 prefix_1 mb40">
        <?php echo $html->image("print_media.jpg",array('alt' => 'print')); ?>
    </div>
    <div class="grid_11 prefix_1 inner-border-radius box_shadow css3pie relative">
        <?php echo $this->Html->link(__('Print/Cetak Kartu Peserta',true),array('controller'=>'registrations','action'=>'printKartuPeserta'),array('class'=>'share_link size24', 'target' => '_blank')); ?>
    </div>
    <div class="clear"></div>
    
    <?php endif; ?>
    
    <h2 class="helvetica">
        <?php __('Berbagi dengan teman-temanmu melalui Social Media')?>
    </h2>
    
    <div class="grid_3 prefix_1 mb40">
        <?php echo $html->image("fb_share.jpg",array('alt' => 'share to fb')); ?>
    </div>
    <div class="grid_11 prefix_1 inner-border-radius box_shadow css3pie relative">
        <!-- <a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php echo htmlspecialchars(__('Pendaftaran Siswa Baru | PPDB Online SMAN 1 Tambun Selatan', true),ENT_QUOTES); ?>&amp;p[url]=<?php echo urlencode(Router::url(array('admin'=>false,'controller'=>'registrations','action'=>'add'),true)); ?>&amp;p[images][0]=<?php echo Router::url('/',true) ?>img/fb_share_logo.png&amp;p[summary]=<?php __('Pendaftaran Siswa Baru | PPDB Online SMAN 1 Tambun Selatan')?>" class="window_popup share_link size24"><?php __('Share di wall Facebookmu')?></a> -->
        <a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php echo htmlspecialchars(__('Pendaftaran Siswa Baru | PPDB Online SMAN 1 Tambun Selatan', true),ENT_QUOTES); ?>&amp;p[url]=<?php echo urlencode(Router::url(array('admin'=>false,'controller'=>'registrations','action'=>'add'),true)); ?>&amp;p[images][0]=http://content.screencast.com/users/exa/folders/ppdb/media/c942319f-8e60-49f8-bc95-2ac92536b0eb/fb_share_logo.png&amp;p[summary]=<?php __('Pendaftaran Siswa Baru | PPDB Online SMAN 1 Tambun Selatan')?>" class="window_popup share_link size24"><?php __('Share di wall Facebookmu')?></a>
    </div>
    <div class="clear"></div>
    
    <div class="grid_3 prefix_1 mb40">
        <?php echo $html->image("twitter_share.jpg",array('alt' => 'share to twitter')); ?>
    </div>
    <div class="grid_11 prefix_1 inner-border-radius box_shadow css3pie relative">
        <a href="http://twitter.com/share?url=<?php echo urlencode(Router::url(array('admin'=>false,'controller'=>'registrations','action'=>'add'),true)); ?>&text=<?php echo urlencode(__('Pendaftaran Siswa Baru | PPDB Online SMAN 1 Tambun Selatan', true)); ?>" class="window_popup share_link size24"><?php __('Share di twitter')?></a>
    </div>
    <div class="clear"></div>
    
</div>