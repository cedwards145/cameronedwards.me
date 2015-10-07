<script src="<?php echo base_url(); ?>assets/js/blog.js"></script>

<div class="row">
  <div class="col-xs-12">
    <form id="blog-form" method="POST" action="">
      <input type="hidden" name="id" id="idField" value="{id}">
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" name="title" class="form-control" required autofocus value="{title}">
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" rows=10>{content}</textarea>
      </div>
      <button class="btn btn-lrg btn-block btn-primary">Submit</button>
    </form>
  </div>
</div>
