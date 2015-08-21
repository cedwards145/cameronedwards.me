<div class="row">
  <div class="col-xs-12">
    <form method="POST" id="form">
      <input type="hidden" name="id" value="{id}">

      <div class="form-group">
        <label>Project Name</label>
        <input type="text" name="name" class="form-control" value="{name}">
      </div>

      <div class="form-group">
        <label>Project Section</label>
        <input type="text" name="section" id="section-field" class="form-control" value="{section}">
      </div>

      <div class="form-group">
        <label>Project Tag</label>
        <input type="text" name="tag" id="tag-field" class="form-control" value="{tag}">
      </div>

      <div class="form-group">
        <label>Project Color</label>
        <input type="text" name="color" class="form-control" value="{color}">
      </div>

      <div class="form-group">
        <label>Project Content</label>
        <textarea rows=20 name="content" class="form-control">{content}</textarea>
      </div>

      <button class="btn btn-lrg btn-block btn-primary" type="submit">Save</button>
    </form>

  </div>
</div>

<script>
$(document).ready(function()
{
  $("#form").submit( function (event)
  {
    event.preventDefault();
    updateProject();
  });
});

</script>
