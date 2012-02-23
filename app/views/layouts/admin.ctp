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
  
  <?php 
    echo $this->Html->css(array('style','960_24_col','jqueryui/jquery-ui-1.8.9.custom','admin_style'));
  ?>

  <style type="text/css">
    .css3pie{
        behavior:url("<?php echo Router::url('/',true) ?>css3pie/PIE.php");
    }
  </style>
 
  <?php echo $this->Javascript->link('libs/modernizr-1.6.min'); ?>

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

</head>

<body>

  <div id="container" class="container_24">
    <header>
        <div class="grid_4 prefix_1">
            <h1><?php echo $html->image("logo.png",array('alt' => 'SMAN 1 Tambun Selatan')); ?></h1>
        </div>
        <div class="grid_19 header_text">
            <h1><?php echo $options['nama_aplikasi']; ?></h1>
            <h3><?php echo $options['nama_sekolah']; ?></h3>
            <h3>Tahun Pelajaran <?php echo $options['tahun_pelajaran']; ?> / <?php echo $options['tahun_pelajaran'] + 1; ?></h3>
            <h3><?php echo $options['alamat']; ?> Tel/Fax <?php echo $options['no_telp']; ?> / <?php echo $options['no_faks']; ?> <?php echo $options['kecamatan']; ?> <?php echo $options['kodepos']; ?></h3>
            <h3><?php echo $options['kota']; ?> <?php echo $options['propinsi']; ?></h3>
        </div>
        <div class="clear"></div>
        <nav class="topnav">
            <ul>
                <li class="<?php echo $menu->highlight('/users/dashboard$'); ?>">
                    <?php echo $this->Html->link(__('Beranda',true),array('admin'=>true,'controller'=>'users','action'=>'dashboard')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/registrations/dataSiswa$'); ?>">
                    <?php echo $this->Html->link(__('Data Calon Siswa',true),array('admin'=>true,'controller'=>'registrations','action'=>'dataSiswa')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/options/profileSekolah$'); ?>">
                    <?php echo $this->Html->link(__('Profile Sekolah',true),array('admin'=>true,'controller'=>'options','action'=>'profileSekolah')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/options/setting$'); ?>">
                    <?php echo $this->Html->link(__('Settings',true),array('admin'=>true,'controller'=>'options','action'=>'setting')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/posts$'); ?>">
                    <?php echo $this->Html->link(__('Posts',true),array('admin'=>true,'controller'=>'posts','action'=>'index')); ?>
                </li>
                <li class="<?php echo $menu->highlight('/users$'); ?>">
                    <?php echo $this->Html->link(__('Users',true),array('admin'=>true,'controller'=>'users','action'=>'index')); ?>
                </li>
                <li class="last">
                    <?php 
                    echo "<span>Selamat Datang <b>".$userLoggedIn."</b></span>";
                    echo $this->Html->link(__('Logout',true),array('admin'=>false,'controller'=>'users','action'=>'logout')); ?>
                </li>
            </ul>
        </nav>
    </header>
    
    <?php
        echo $this->Session->flash();
        echo $content_for_layout;
    ?>
    
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
    echo $this->Javascript->link('mylibs/jquery.dataTables.min');
    echo $this->Javascript->link('jquery-ui-1.8.9.custom/js/jquery-ui-1.8.9.custom.min');
    echo $this->Javascript->link('admin/script');
  ?>
  
  <!--[if lt IE 7 ]>
    <?php echo $this->Javascript->link('libs/dd_belatedpng'); ?>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->

  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet 
       change the UA-XXXXX-X to be your site's ID -->
  <!--
  <script>
   var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
   (function(d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
   })(document, 'script');
  </script> -->
  
</body>
</html>