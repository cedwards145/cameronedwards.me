<?php echo img(array('src' =>'assets/img/{headerImage}',
                     'class' => 'img-responsive')); ?>

<style>
h1, h2, h3
{
  color:{color};
}
</style>

<div class="row">
  <div class="col-xs-12 col-md-10 col-md-offset-1">
    <h1>{name}</h1>

    {content}

    {if {hasScreenshots} == 1}
      <h3>Screenshots</h3>

      <div class="row" id="screenshots">

      {screenshots}
        <div class="col-xs-6 col-sm-4 col-md-3">
          <a href="<?php echo base_url(); ?>assets/img/{path}">
            <?php echo img(array('src' =>'assets/img/{thumb}', 'class' => 'img-responsive')); ?>
          </a>
        </div>
      {/screenshots}

      <script>
        $(document).ready(function()
        {
          magnificInit();
        });
      </script>
      </div>
    {/if}

    {downloads}
    {/downloads}

  </div>
</div>
