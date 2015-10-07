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
