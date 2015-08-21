<div class="row">
  <div class="col-xs-12">
    <h1>Admin Panel <a href="#admin/logout">(logout)</a></h1>

    <h2>Projects</h2>
      <ul>
        {projects}
          <li>
            <a href="#admin/project/{tag}">{name}</a>
          </li>
        {/projects}
      </ul>
    <h2>Screenshots</h2>
      <form method="post" id="screenshot-form" enctype="multipart/form-data">
        <h4>Add new screenshot:</h4>
        <input type="file" name="userfile"/>
        <button class="btn btn-primary" type="submit">Upload</button>
      </form>
      <br />

      <ul class="row">
        {screenshots}
          <li class="col-xs-6 col-sm-4 col-md-2 screenshot">
            <a href="#admin/screenshot/{id}">
              <?php echo img(array('src' =>'assets/img/{thumb}', 'class' => 'img-responsive')); ?>
            </a>
          </li>
        {/screenshots}
      </ul>

    <h2>Downloads</h2>
      {downloads}
        <a href="#admin/download/{tag}">{name}</a>
      {/downloads}

  </div>
</div>

<script>
$(document).ready(function()
{
  $("#screenshot-form").submit( function (event)
  {
    event.preventDefault();
    uploadScreenshot();
  });
});
</script>
