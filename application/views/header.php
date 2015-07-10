<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/css/custom.css'); ?>
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/hashchange.min.js"></script>

    <script>
      $(document).ready(function()
      {
        $(window).hashchange( function ()
        {
          loadPage( location.hash );
        })

        $(window).hashchange();
      });

      function loadPage(page)
      {
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

        $("li").removeClass("active");


        if (page.indexOf("games") > -1)
        {
          $("#games-li").addClass("active");
        }
        else if (page.indexOf("web") > -1)
        {
          $("#web-li").addClass("active");
        }
        else
        {
          page = '#home';
          $("#home-li").addClass("active");
        }


        var mainDiv = $("#main");

        var width = $("#main").width();
        mainDiv.animate(
          {
            "margin-left": -1 * width
          }, 500, "swing", function()
            {
              mainDiv.empty();
              mainDiv.load(baseUrl + "/" + page.substring(1));
              mainDiv.css("margin-left", width);
            });

        mainDiv.animate(
          {
            "margin-left": 0
          }, 500);
      }

      function loadImg(src)
      {
        $("#main-img").attr("src", src);
      }
    </script>

    <div class="navbar-default">
      <div class="container">
        <ul class="nav navbar-nav">
          <a class="navbar-brand">Cameron Edwards.me</a>
          <li id="home-li"><a href="#home">Home</a></li>
          <li id="games-li"><a href="#games">Games</a></li>
          <li id="web-li"><a href="#web">Web</a><li>

        </ul>
      </div>
    </div>

    <div class="container main-container" >
      <div id="main">

      </div>
    </div>

  </body>
</html>
