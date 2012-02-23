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
    echo $this->Html->css(array('style','960','login'));
  ?>

  <style type="text/css">
    .css3pie, .input{
        behavior:url("<?php echo Router::url('/',true) ?>css3pie/PIE.php");
    }
  </style>
 
  <?php echo $this->Javascript->link('libs/modernizr-1.6.min'); ?>

</head>

<body>

  <div id="container" class="container_16">
    <div class="grid_8 prefix_4 suffix_4">
        <div class="container_login">
            <?php
                echo $this->Session->flash('auth');
                echo $content_for_layout;
            ?>
        </div>
    </div>
  </div> <!--! end of #container -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo Router::url('/') ?>js/libs/jquery-1.5.min.js"%3E%3C/script%3E'))</script>
  
  <?php
    echo $scripts_for_layout;
    echo $this->Javascript->link('mylibs/jquery.html5form-1.2-min');
    echo $this->Javascript->link('login/script');
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