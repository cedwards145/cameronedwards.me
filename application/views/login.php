<script src="<?php echo base_url(); ?>assets/js/login.js"></script>

<div class="row">
  <div class="col-xs-12 col-md-6 col-md-offset-3">
    <h1>Site administration login</h1>

    <form id="login-form" method="POST" action="">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required autofocus>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-lrg btn-block btn-primary">Sign in</button>

    </form>
  </div>
</div>
