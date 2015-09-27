<div class="row">

  <div class="col-xs-12">
    {projects}
      <div class="img-container">
        <div class="img-text">
          <a href="#{section}/{tag}"><h2 style="color:{color};">{name}</h2></a>
        </div>
        <?php echo img(array('src' =>'assets/img/{headerImage}')); ?>
      </div>
    {/projects}
  </div>

</div>
