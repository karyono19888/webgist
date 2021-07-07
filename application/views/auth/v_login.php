<div class="container auth-card">
  <div class="row justify-content-center">
    <div class="col-sm-6 align-self-center">
      <div class="text-center my-2">
          <img src="<?= $logo_source = (empty($dataapp['logo_instansi'])) ? base_url('assets/img/clock-image.png') : (($dataapp['logo_instansi'] == 'default-logo.png') ? base_url('assets/img/clock-image.png') : base_url('storage/setting/' . $dataapp['logo_instansi'])); ?>" class="card-img" style="width:50%;">
          <h3 class="text-white"><?= $appname = (empty($dataapp['nama_app_absensi'])) ? 'Absensi Online' : $dataapp['nama_app_absensi']; ?></h3>
          <h4 id="date-and-clock mt-3">
              <h5 class="text-white" id="clocknow"></h5>
              <h5 class="text-white" id="datenow"></h5>
          </h4>
      </div>
    </div>
    <!-- col lg 6 -->
    <div class="col-sm-6">
      <body class="hold-transition login-page">
      <div class="login-box">
          <div class="login-logo">
              <a href="#"><b>Admin </b>Login</a>
          </div>
      <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?= $this->session->flashdata('authmsg'); ?>

            <form action="<?= base_url('auth'); ?>" method="post">
            <?= form_open('login'); ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Input Username" name="usernmae" id="username"value="<?= set_value('username')?>" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <?= form_error('Username','<small class="text-danger pl-3">','</small>'); ?>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Input Password" name="password" id="a_user_password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="rememberme">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4 mb-3">
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
    </div>
  </div>
</div>