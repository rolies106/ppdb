<div class="block_content grid_23 pal">
    
    <div class="message fsize14 mb40 <?php echo ($pass == 1) ? 'success' : 'failed';?>">
        <?php echo $msg; ?>
    </div>
    
    <?php if($pass == 1): ?>
    
    <div class="message txtleft mbl">
        <p>
            Adapun dokumen yang perlu dibawa pada saat verifikasi antara lain :
            <ul>
                <li class="fsize12">Surat Pernyataan (cetak via web)</li>
                <li class="fsize12">Formulir Pendaftaran (cetak via web)</li>
                <li class="fsize12">Nilai Rapor (cetak via web)</li>
                <li class="fsize12">Rapor Asli</li>
                <li class="fsize12">Legalisir Rapor Kelas IV s.d Kelas VI (1 set)</li>
                <li class="fsize12">Surat Keterangan Kelakuan Baik (SKKB) dari Kepala SD/MI asal (1 Lembar)</li>
                <li class="fsize12">Surat Keterangan bahwa yang bersangkutan merupakan siswa kelas VI dari Kepala SD/MI asal (1 Lembar)</li>
                <li class="fsize12">Foto ukuran 2X3 = 2 lembar dan 3X4 = 2 lembar berwarna dan berseragam sekolah asal</li>
                <li class="fsize12">
                    Menyerahkan surat keterangan lain sebagai pendukung (jika ada) seperti :
                    <ol>
                        <li class="fsize12">Sertifikat Bhs. Inggris, Komputer, dll.</li>
                        <li class="fsize12">Sertifikat Prestasi Akademik minimal Juara 1 Tingkat Kab/Kota.</li>
                        <li class="fsize12">Sertifikat Prestasi Non-Akademik minimal Juara 1 Tingkat Kab/Kota.</li>
                        <li class="fsize12">Piagam Penghargaan atau Surat keterangan dari Kepala Sekolah asal sebagai Juara Umum dua Tahun berturut-turut di kelas V dan VI.</li>
                    </ol>
                </li>
                <li class="fsize12">Bagi calon peserta didik yang berasal dari SD/MI Luar Kabupaten Bekasi, wajib membawa surat verifikasi dari Dinas Pendidikan setempat</li>
            </ul>
        </p>
    </div>

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
        <!-- <a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php echo htmlspecialchars(__($option['nama_aplikasi'] . ' | ' . $option['nama_sekolah'], true),ENT_QUOTES); ?>&amp;p[url]=<?php echo urlencode(Router::url(array('admin'=>false,'controller'=>'registrations','action'=>'add'),true)); ?>&amp;p[images][0]=<?php echo Router::url('/',true) ?>img/fb_share_logo.png&amp;p[summary]=<?php __($option['nama_aplikasi'] . ' | ' . $option['nama_sekolah'])?>" class="window_popup share_link size24"><?php __('Share di wall Facebookmu')?></a> -->
        <a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php echo htmlspecialchars(__($option['nama_aplikasi'] . ' | ' . $option['nama_sekolah'], true),ENT_QUOTES); ?>&amp;p[url]=<?php echo urlencode(Router::url(array('admin'=>false,'controller'=>'registrations','action'=>'add'),true)); ?>&amp;p[images][0]=http://dl.dropbox.com/u/8975699/logo/logo.png&amp;p[summary]=<?php __($option['nama_aplikasi'] . ' | ' . $option['nama_sekolah'])?>" class="window_popup share_link size24"><?php __('Share di wall Facebookmu')?></a>
    </div>
    <div class="clear"></div>
    
    <div class="grid_3 prefix_1 mb40">
        <?php echo $html->image("twitter_share.jpg",array('alt' => 'share to twitter')); ?>
    </div>
    <div class="grid_11 prefix_1 inner-border-radius box_shadow css3pie relative">
        <a href="http://twitter.com/share?url=<?php echo urlencode(Router::url(array('admin'=>false,'controller'=>'registrations','action'=>'add'),true)); ?>&text=<?php echo urlencode(__($option['nama_aplikasi'] . ' | ' . $option['nama_sekolah'], true)); ?>" class="window_popup share_link size24"><?php __('Share di twitter')?></a>
    </div>
    <div class="clear"></div>
    
</div>