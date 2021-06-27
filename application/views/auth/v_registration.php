<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Registration</b></a>
  </div>

  <div class="card card-outline card-primary">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?= base_url('auth/registration')?>" method="post" class="user">
      <?= form_error('a_user_name','<small class="text-danger">','</small>'); ?>
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="a_user_name" id="a_user_name" value="<?= set_value('a_user_name'); ?>">
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <?= form_error('a_user_email','<small class="text-danger">','</small>'); ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="a_user_email" id="a_user_email" value="<?= set_value('a_user_email'); ?>">
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <?= form_error('a_user_password2','<small class="text-danger">','</small>'); ?>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="a_user_password" id="a_user_password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="a_user_password2" id="a_user_password2">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <!-- <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a> -->
      </div>

      <a href="<?= base_url('auth');?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
