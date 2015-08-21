<div class="row">
  <div class="col-xs-12">
    <div style="text-align:center;">
      <?php echo img(array('src' =>'assets/img/{path}')); ?>
    </div>
    <br />

    <form method="POST" id="form">
      <input type="hidden" name="id" value="{id}">

      <div class="form-group">
        <label>Screenshot Tag</label>
        <input type="text" name="tag" id="tag-field" class="form-control" value="{tag}">
      </div>

      <button class="btn btn-lrg btn-block btn-primary" type="submit">Save</button>
    </form>

    <a class="btn btn-lrg btn-block btn-danger" href="#admin/deleteScreenshot/{id}">Delete</a>
  </div>
</div>

<script>
$(document).ready(function()
{
  $("#form").submit( function (event)
  {
    event.preventDefault();
    updateScreenshot();
  });
});

</script>
