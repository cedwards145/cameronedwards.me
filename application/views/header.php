<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/css/custom.css'); ?>
    <?php echo link_tag('assets/css/magnific.css'); ?>

    <title>Cameron Edwards.me</title>
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/hashchange.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/magnific.min.js"></script>

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
        else if (page.indexOf("blog") > -1)
        {
          $("#blog-li").addClass("active");
        }
        else if (page.indexOf("admin") > -1)
        {
          $("#admin-li").addClass("active");
        }
        else
        {
          page = '#home';
          $("#home-li").addClass("active");
        }

        var mainDiv = $("#main");

        mainDiv.fadeOut(500, function()
        {
          mainDiv.empty();
          mainDiv.load(baseUrl + "/" + page.substring(1));
        });

        mainDiv.fadeIn(500);

        /*
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
          }, 500, "swing");
        */
      }

      function login()
      {
        $.ajax(
        {
          type: "POST",
          url: "admin/submit",
          data: $("#login-form").serialize(),
          success: function(data)
          {
            if (data == "success")
            {
              alert("Login successful");
              $(window).hashchange();
            }
            else
            {
              alert("Incorrect Username or Password");
            }
          }
        });

        return false;
      }

      function magnificInit()
      {
        $('#screenshots').magnificPopup(
        {
          delegate: 'a',
          type: 'image',
          gallery:{enabled:true}
        });
      }

      function updateProject()
      {
        var tag = $("#tag-field").val();
        var section = $('#section-field').val();
        $.ajax(
        {
          type: "POST",
          url: "admin/submitProject",
          data: $("#form").serialize(),
          success: function(data)
          {
            window.location.hash = "#" + section + "/" + tag;
          }
        });
      }

      function updateScreenshot()
      {
        $.ajax(
        {
          type: "POST",
          url: "admin/submitScreenshot",
          data: $("#form").serialize(),
          success: function(data)
          {
            window.location.hash = "#admin";
          }
        });
      }

      function uploadScreenshot()
      {
        $.ajax(
        {
          type: "POST",
          url: "admin/uploadScreenshot",
          data: new FormData($("#screenshot-form")[0]),
          processData: false,
          contentType: false,
          success: function(data)
          {
            window.location.hash = "#admin";
          }
        });
      }
    </script>

    <div class="navbar-default">
      <div class="container">
        <ul class="nav navbar-nav">
          <li><a class="navbar-brand">Cameron Edwards.me</a></li>
          <li id="home-li"><a href="#home">Home</a></li>
          <li id="blog-li"><a href="#blog">Blog</a></li>
          <li id="games-li"><a href="#games">Games</a></li>
          <li id="web-li"><a href="#web">Web</a><li>
          <li id="admin-li"><a href="#admin">Admin</a><li>
        </ul>
      </div>
    </div>

    <div class="container main-container" >
      <div id="main">

      </div>
    </div>

  </body>
</html>
