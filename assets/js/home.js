$(document).ready(function()
{
  $(".coverImg").mouseenter(function(){
    $(this).css("opacity", 1);
  }).mouseleave(function(){
    $(this).animate({"opacity": 0.5});
  });;

  var gameHeader = $("#gameHeader");
  hHeight = gameHeader.outerHeight(true) - gameHeader.css("margin-bottom").replace("px", "");
  initialMargin = gameHeader.css("margin-top").replace("px", "");
  scroll();
});

var hHeight;
var initialMargin;

function scroll()
{
  var scrollDiv = $("#scrollDiv");
  var child = scrollDiv.children().first();
  child.delay(2000).animate({
      "margin-top": "-=" + hHeight
    }, function ()
    {
      scrollDiv.append(child);
      child.css("margin-top", initialMargin);
      scroll();
    });
}
