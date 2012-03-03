<!doctype html>  

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $title_for_layout; ?></title>
  <meta name="description" content="Aplikasi Penerimaan Siswa Baru Secara Online">
  <meta name="author" content="SMAN 1 Tambun Selatan">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="<?php echo Router::url('/',true) ?>favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="image_src" href="<?php echo Router::url('/',true) ?>img/fb_share_logo.png" />

  <?php 
    echo $this->Html->css(array('style','960_24_col','global', 'nivo-pascal/pascal.css', 'nivo-default/nivo-slider.css'));
  ?>

  <style type="text/css">
    .css3pie, .current_page_item a, .topmenu a:hover{
        behavior:url("<?php echo Router::url('/',true) ?>css3pie/PIE.php");
    }
  </style>
 
  <?php echo $this->Javascript->link('libs/modernizr-1.6.min'); ?>

</head>

<body>

    <header id="header">
    
        <div id="header-wrapper" class="container_24">
            <div class="grid_4 prefix_1">
                <h1 class="logo mtl"><?php echo $html->image("logo.png",array('alt' => 'SMAN 1 Tambun Selatan')); ?></h1>
            </div>
            <div class="grid_18">
                <h1 class="logo-text"><?php echo $options['nama_sekolah']; ?></h1>
                <h2 class="slogan-text">Rintisan Sekolah Berskala Internasional</h2>
            </div>
        </div>
        <div class="clear"></div>

    </header>

    <nav class="topmenu">
        <div class="container_24">
            <ul>
                <li class="<?php echo $menu->highlight('/$'); ?>">
                    <?php echo $this->Html->link(__('Beranda',true),array('admin'=>false,'controller'=>'posts','action'=>'index')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/pengumuman$'); ?>">
                    <?php echo $this->Html->link(__('Pengumuman',true),array('admin'=>false,'controller'=>'registrations','action'=>'listAll')); ?>
                </li>
                <?php if ($this->Session->check('Auth.User.id') == false) { ?>
                    <li class="<?php echo $menu->highlight('/daftar$'); ?>">
                        <?php echo $this->Html->link(__('Daftar',true),array('admin'=>false,'controller'=>'registrations','action'=>'add')); ?>
                    </li>
                <?php } ?>
                <li class="<?php echo $menu->highlight('/profile-sekolah$'); ?>">
                    <?php echo $this->Html->link(__('Sekolah',true),array('admin'=>false,'controller'=>'options','action'=>'profileSekolah')); ?>
                </li>
                <?php if ($this->Session->check('Auth.User.id') == false) { ?>
                    <li class="<?php echo $menu->highlight('/login$'); ?>">
                        <?php echo $this->Html->link(__('Login',true),array('admin'=>false,'controller'=>'users','action'=>'login')); ?>
                    </li>
                <?php } else { ?>
                    <li class="<?php echo $menu->highlight('/member/profile$'); ?>">
                        <?php echo $this->Html->link(__('Profile',true),array('member'=>true,'controller'=>'registrations','action'=>'profile')); ?>
                    </li>
                    <li class="<?php echo $menu->highlight('/users/logout$'); ?>">
                        <?php echo $this->Html->link(__('Logout',true),array('admin'=>false,'controller'=>'users','action'=>'logout')); ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clear"></div>
    </nav>

  <div id="container" class="container_24">
    
    <div id="main" class="mainContent mb40- css3pie">
        <?php echo $content_for_layout; ?>
        <div class="clear"></div>
    </div>
        
  </div> <!--! end of #container -->
    <footer>
        <div class="footer-wrap container_24">
            <div class="grid_7 box">
                <ul>
                    <li><?php echo $options['nama_sekolah']; ?></li>
                    <li><?php echo $options['alamat']; ?></li>
                    <li>Tel/Fax <?php echo $options['no_telp']; ?> / <?php echo $options['no_faks']; ?></li>
                    <li><?php echo $options['kecamatan']; ?> <?php echo $options['kodepos']; ?></li>
                    <li><?php echo $options['kota']; ?> <?php echo $options['propinsi']; ?></li>
                </ul>
            </div>
            
            <div class="grid_5 box">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Cara mendaftar PPDB</a></li>
                    <li><a href="#">Persyaratan PPDB</a></li>
                    <li><a href="#">Berita Sekolah</a></li>
                    <li><a href="#">Event Calendar</a></li>
                    <li><a href="#">Media</a></li>
                </ul>
            </div>

            <div class="grid_5 box">
                <h3>Explore</h3>
                <ul>
                    <li><a href="#">Our Missions</a></li>
                    <li><a href="#">Struktur Organisasi</a></li>
                    <li><a href="#">Sambutan Kepala Sekolah</a></li>
                </ul>
            </div>
            <div class="grid_6 box">
                <h3>Ikuti Kami Di</h3>
                <ul class="follow">
                    <li><img src="<?php echo Router::url('/',true) ?>img/icon/facebook.png" /></li>
                    <li><img src="<?php echo Router::url('/',true) ?>img/icon/twitter.png" /></li>
                    <li><img src="<?php echo Router::url('/',true) ?>img/icon/rss.png" /></li>
                    <li><img src="<?php echo Router::url('/',true) ?>img/icon/mail.png" /></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="footer-wrap container_24">
            <div class="footer-left">
                Copyright &copy; <?php echo date('Y'); ?> <?php echo $options['nama_sekolah']; ?>
            </div>
            
            <div class="footer-right">
                <a href="http://kongcreate.com" title="KongCreate">Designed and Developed by KongCreate.com</a><a href="http://kongcreate.com" title="Professional Web Based Application and Web Site Developer"><?php echo $html->image("kong-create.png",array('alt' => 'Professional Web Based Application and Web Site Developer')); ?></a>
            </div>
        </div>
        <div class="clear"></div>
    </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo Router::url('/') ?>js/libs/jquery-1.5.min.js"%3E%3C/script%3E'))</script>
  
  <?php
    echo $scripts_for_layout;
    echo $this->Javascript->link('jquery.popupWindow');
    echo $this->Javascript->link('mylibs/jquery.tipsy');
    echo $this->Javascript->link('plugins');
    echo $this->Javascript->link('mylibs/jquery.dataTables.min');
    echo $this->Javascript->link('mylibs/jquery.colorbox-min');
    echo $this->Javascript->link('script');
  ?>
  
  <!--[if lt IE 7 ]>
    <?php echo $this->Javascript->link('libs/dd_belatedpng'); ?>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->

    <script type="text/javascript">
    
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-5255441-2']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    
    </script>
  
</body>
</html>
