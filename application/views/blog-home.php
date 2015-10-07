<div class="row">
  <?php if ($this->session->userdata('loggedIn')): ?>
    <div class="col-xs-12">
      <h4><a href="#blog/edit/">New Post</a></h4>
    </div>
  <?php endif;?>

  <ul class="list-unstyled">
    {posts}
      <li>
        <div class="col-xs-12 col-sm-4 col-md-3">
          <div class="row">
            <div class="col-xs-10 col-xs-offset-1 blog-post">
              <a href="#blog/post/{id}"><h2>{title}</h2></a>
              <i>{date}</i>
            </div>
          </div>
        </div>
      </li>
    {/posts}
  </ul>
  <div class="col-xs-12">
    {pagination}
  </div>

</div>
