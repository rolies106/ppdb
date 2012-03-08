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
    echo $this->Html->css(array('style','960_24_col','global'));
  ?>

  <style type="text/css">
    .css3pie, .current_page_item a, .topmenu a:hover{
        behavior:url("<?php echo Router::url('/',true) ?>css3pie/PIE.php");
    }
  </style>
 
  <?php echo $this->Javascript->link('libs/modernizr-1.6.min'); ?>

</head>

<body>

  <div id="container" class="container_24">
    <header id="header">
        
        <div class="grid_4 prefix_1">
            <h1 class="logo mtl"><?php echo $html->image("logo.png",array('alt' => 'SMAN 1 Tambun Selatan')); ?></h1>
        </div>
        
        <nav class="grid_9 prefix_10 topmenu">
            <ul>
                <li class="<?php echo $menu->highlight('/$'); ?>">
                    <?php echo $this->Html->link(__('Beranda',true),array('admin'=>false,'controller'=>'posts','action'=>'index')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/pengumuman$'); ?>">
                    <?php echo $this->Html->link(__('Pengumuman',true),array('admin'=>false,'controller'=>'registrations','action'=>'listAll')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/daftar$'); ?>">
                    <?php echo $this->Html->link(__('Daftar',true),array('admin'=>false,'controller'=>'registrations','action'=>'add')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/profile-sekolah$'); ?>">
                    <?php echo $this->Html->link(__('Sekolah',true),array('admin'=>false,'controller'=>'options','action'=>'profileSekolah')); ?>
                </li>
            </ul>
        </nav>
        <div class="clear"></div>
    </header>
    
    <div id="main" class="mainContent mb40- border-radius css3pie">
        <?php echo $content_for_layout; ?>
        <div class="clear"></div>
    </div>
    
    <footer>
        <div class="footer-wrap">
            <div class="footer-left">
                Copyright &copy; <?php echo date('Y'); ?> <?php echo $options['nama_sekolah']; ?>
            </div>
            
            <div class="footer-right">
                <a href="http://tukutoko.com" title="TukuToko">Designed and Developed by TukuToko.com</a><a href="http://tukutoko.com" title="Professional Web Based Application and Web Site Developer"><?php echo $html->image("tukutoko_logo.gif",array('alt' => 'Professional Web Based Application and Web Site Developer')); ?></a>
            </div>
        </div>
    </footer>
    
  </div> <!--! end of #container -->

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
