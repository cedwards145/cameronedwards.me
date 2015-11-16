<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/css/custom.css'); ?>
    <?php echo link_tag('assets/css/magnific.css'); ?>
    <?php echo link_tag('assets/css/syntax.css'); ?>

    <title>Cameron Edwards.me</title>
  </head>
  <body>
    <div class="navbar-default">
      <div class="container">
        <ul class="nav navbar-nav">
          <li class="navbar-brand">Cameron Edwards.me</li>
          <li id="home-li"><a href="#home">Home</a></li>
          <li id="blog-li"><a href="#blog">Blog</a></li>
          <li id="games-li"><a href="#games">Games</a></li>
          <li id="web-li"><a href="#web">Web</a><li>
        </ul>
      </div>
    </div>

    <div class="container main-container" >
      <div id="main">

      </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/hashchange.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/magnific.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-66605344-1', 'auto');
      ga('send', 'pageview');

    </script>
  </body>
</html>
