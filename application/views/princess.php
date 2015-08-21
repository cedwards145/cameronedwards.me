<?php echo img(array('src' =>'assets/img/princess-header.png')); ?>

<style>
h1, h2, h3
{
  color:#6BB5DE;
}
</style>

<div class="row">
  <div class="col-xs-12 col-md-10 col-md-offset-1">
    <h1>A Princess' Request</h1>

    <p>
      <i>
        A young, mute knight hears a cry for help from a princess in danger while
        exploring some suspicious ruins. Unable to ignore this, he embarks on a
        quest between worlds to fix her mysterious "Machine."
        <br/>
        (Note that the description may or may not embelish gameplay)
      </i>
    </p>

    <h3 style="color:#6BB5DE;">About</h3>
    <p>
      A Princess' Request was built in 48 hours for the
      <a href="http://ludumdare.com/compo/" target="blank">Ludum Dare</a> game
      development competition, meaning that all code, graphics and audio where
      created in 48 hours. <br/>
      The game was written in C# using Microsoft's XNA game framework, and is
      playable on Windows only.
    </p>

    <h3 style="color:#6BB5DE;">Screenshots</h3>

    <div class="row">

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <?php echo img(array('src' =>'assets/img/ss2.png',
                                   'id' => 'main-img')); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-xs-6 col-sm-4 col-md-3">
        <a href="#games/princess" data-toggle="modal" data-target="#myModal">
          <?php echo img(array('src' =>'assets/img/ss1.png', 'class' => 'img-responsive')); ?>
        </a>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-3">
        <?php echo img(array('src' =>'assets/img/ss2.png', 'class' => 'img-responsive')); ?>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-3">
        <?php echo img(array('src' =>'assets/img/ss3.png', 'class' => 'img-responsive')); ?>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-3">
        <?php echo img(array('src' =>'assets/img/ss4.png', 'class' => 'img-responsive')); ?>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-3">
        <?php echo img(array('src' =>'assets/img/ss5.png', 'class' => 'img-responsive')); ?>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-3">
        <?php echo img(array('src' =>'assets/img/ss6.png', 'class' => 'img-responsive')); ?>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-3">
        <?php echo img(array('src' =>'assets/img/ss7.png', 'class' => 'img-responsive')); ?>
      </div>
    </div>

    <h3>Downloads</h3>
    <p>

    </p>

    <h3></h3>
    <p>

    </p>

  </div>
</div>
