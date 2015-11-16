<div class="row" style="height:65px; overflow:hidden">
  <div class="hidden-xs col-md-6" style="text-align:right">
    <h1>Cameron Edwards:</h1>
  </div>
  <div id="scrollDiv" class="col-xs-6 col-md-6">
    <h1 id="gameHeader">Game Developer</h1>
    <h1>Amateur Artist</h1>
    <h1>Web Designer</h1>
    <h1>Occasional Writer</h1>
  </div>
</div>
<br />
<div class="row">
  <div class="col-xs-12">
    {images}
      <a href="<?php echo base_url(); ?>#projects/{tag}">
        <span class="col-xs-6 col-sm-4 col-md-3 coverImg" style="background: url(<?php echo base_url(); ?>assets/img/{thumb})"></span>
      </a>
    {/images}
  </div>
</div>

<script>
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
  console.log(hHeight);

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
</script>
